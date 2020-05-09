<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Http\Requests\ExpenseRequest;
use App\Http\Requests\ExpenseUpdateRequest;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Carbon;
use PDF;
use App\Models\Auth\User;

class ExpenseController extends Controller
{

    public function index(Request $request)
    {
      // $expenses = Expense::orderBy('updated_at', 'desc')->paginate();
      // return view('backend.transaction.expense.index', compact('expenses'));

        if ($request->ajax()) {
            // select('id', 'name', 'address', 'created_at', 'updated_at')
            $data = Expense::query()->with('user')->select('expenses.*');
            return Datatables::eloquent($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($dat) {
                        return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
                    })
                    ->addColumn('first_name', function (Expense $expense) {
                            return $expense->user ? $expense->user->first_name.' '.$expense->user->last_name : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>';
                    })
                    ->addColumn('action', function($row){
                          $btn = '<div class="btn-group" role="group" aria-label="'. __('labels.backend.access.users.user_actions') .'">

                            <a href="#" data-toggle="modal" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary" data-id="'.$row->id.'" data-myname="'.$row->name.'" data-myprice="'. $row->price .'" data-mycomment="'. $row->comment .'" data-myticketext="'.$row->ticket_text.'" data-target="#editExpense"><i class="fas fa-edit"></i>
                            </a>';
                          $btn = $btn.'<a href="'. route('admin.transaction.expense.generate', $row->id) .'" data-toggle="tooltip" data-placement="top" title="'. __('buttons.general.crud.print') .'" class="btn btn-warning" target="_blank"><i class="fas fa-print"></i>
                              </a>';
                          if(Auth::user()->hasRole('administrator')){
                          $btn = $btn.'
                            <a href="'.route('admin.transaction.expense.destroy', $row->id).'" class="btn btn-delete btn-outline-danger" title="'.$row->name.'" data-trans-button-confirm="'. __('buttons.general.crud.delete').'"  data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-text="'.__('strings.backend.general.revert_this').'" data-trans-title="'.__('strings.backend.general.are_you_sure_delete').'" data-trans-success="'.__('strings.backend.general.success').'" data-trans-deleted="'.__('strings.backend.general.deleted').'" data-trans-wrong="'.__('strings.backend.general.wrong').'"><i class="fas fa-trash"></i></a>
                           ';
                          }
                          return $btn;
                    })
                    ->rawColumns(['first_name', 'action'])
                    ->make(true);
        }
      
        return view('backend.transaction.expense.index');
    }

    public function store(ExpenseRequest $request)
    {
    
      $expense = new Expense();
      $expense->name = $request->name;
      $expense->price = $request->price;
      $expense->user_id = $request->user;
      $expense->comment = $request->comment;
      $expense->ticket_text = $request->ticket_text;
      $expense->audi_id = Auth::id();
      $expense->save();


        return redirect()->route('admin.transaction.expense.index')
          ->withFlashSuccess('Egreso guardado con éxito');

    }

    public function update(ExpenseUpdateRequest $request)
    {

        $type = Expense::findOrFail($request->id);
        $type->update($request->all());

        return redirect()->route('admin.transaction.expense.index')
          ->withFlashSuccess('Egreso actualizado con éxito');
    }


    public function generatePDF($id)
    {
        // $data = ['title' => 'Welcome to '];
        // $pdf = PDF::loadView('mypdf', $data);
        $subscription = Expense::findOrFail($id);

        $customPaper = array(0,0,667.00,283.80);
        $pdf = PDF::setOption('page-height', '267.7')->setOption('page-width', '55.9')->setOption('margin-right', '3')->setOption('margin-left', '3')->setOption('margin-top', '7')->loadView('expense', compact('subscription'));

        return $pdf->stream('#'.$subscription->id.'-inscripcion.pdf');
    }


    public function destroy($id)
    {

        try {
            $expense = Expense::findOrFail($id);
            $expense->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.transaction.expense.index')->withFlashSuccess('Egreso eliminado con éxito');
    }

}

