<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Http\Requests\IncomeRequest;
use App\Http\Requests\IncomeUpdateRequest;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Carbon;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
      // $incomes = Income::orderBy('updated_at', 'desc')->paginate();
      // return view('backend.transaction.income.index', compact('incomes'));

        if ($request->ajax()) {
            // select('id', 'name', 'address', 'created_at', 'updated_at')
            $data = Income::query();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($dat) {
                        return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
                    })
                    ->editColumn('updated_at', function ($dat) {
                        return $dat->updated_at ? with(new Carbon($dat->updated_at))->format('d-m-Y H:i:s') : '';
                    })
                    ->addColumn('action', function($row){
                           $btn = '
                            <div class="btn-group" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">

                               <a href="#" data-toggle="modal" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary" data-id="'.$row->id.'" data-myname="'.$row->name.'" data-myprice="'. $row->price .'" data-mycomment="'. $row->comment .'" data-target="#editIncome"><i class="fas fa-edit"></i></a> ';
                               if(Auth::user()->hasRole('administrator')){
                               $btn = $btn.'
                                <a href="'.route('admin.transaction.income.destroy', $row->id).'" class="btn btn-delete btn-outline-danger" title="'.$row->name.'" data-trans-button-confirm="'. __('buttons.general.crud.delete').'"  data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-text="'.__('strings.backend.general.revert_this').'" data-trans-title="'.__('strings.backend.general.are_you_sure_delete').'" data-trans-success="'.__('strings.backend.general.success').'" data-trans-deleted="'.__('strings.backend.general.deleted').'" data-trans-wrong="'.__('strings.backend.general.wrong').'"><i class="fas fa-trash"></i></a>
                                ';
                                }
                            $btn = $btn. '</div>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('backend.transaction.income.index');

    }

    public function store(IncomeRequest $request)
    {
    
      $input = $request->all();
      $income = Income::create($input);
   
   return redirect()->route('admin.transaction.income.index')
      ->withFlashSuccess('Ingreso guardado con éxito');

    }

    public function update(IncomeUpdateRequest $request)
    {

        $type = Income::findOrFail($request->id);
        $type->update($request->all());

        return redirect()->route('admin.transaction.income.index')
          ->withFlashSuccess('Ingreso actualizado con éxito');
    }

    public function destroy($id)
    {

        try {
            $income = Income::findOrFail($id);
            $income->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.transaction.income.index')->withFlashSuccess('Ingreso eliminado con éxito');
    }


}
