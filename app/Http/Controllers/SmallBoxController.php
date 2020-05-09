<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SmallBox;
use App\Http\Requests\SmallboxRequest;
use App\Http\Requests\SmallboxUpdateRequest;
use DataTables;
use Carbon;

class SmallBoxController extends Controller
{

    public function index(Request $request)
    {
      // $smallbox = SmallBox::orderBy('updated_at', 'desc')->paginate();
      $income = SmallBox::whereType('1')->sum('amount');
      $expenditure = SmallBox::whereType('2')->sum('amount');
      $total = $income-$expenditure;

       if ($request->ajax()) {
            // select('id', 'name', 'address', 'created_at', 'updated_at')
            $data = SmallBox::query();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($dat) {
                        return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
                    })
                    ->addColumn('action', function($row){
                           $btn = '
                            <a href="'.route('admin.transaction.small.destroy', $row->id).'" class="btn btn-delete btn-outline-danger" title="'.$row->name.'" data-trans-button-confirm="'. __('buttons.general.crud.delete').'"  data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-text="'.__('strings.backend.general.revert_this').'" data-trans-title="'.__('strings.backend.general.are_you_sure_delete').'" data-trans-success="'.__('strings.backend.general.success').'" data-trans-deleted="'.__('strings.backend.general.deleted').'" data-trans-wrong="'.__('strings.backend.general.wrong').'"><i class="fas fa-trash"></i></a>
                           ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->toJson();
        }

      return view('backend.transaction.smallbox.index', compact('income', 'expenditure', 'total'));
    }

    public function store(SmallboxRequest $request)
    {
    
    	  $smallbox = new SmallBox();
        $smallbox->name = $request->name;
        $smallbox->amount = $request->amount;
        $smallbox->comment = $request->comment;
        $smallbox->type = $request->type;
        $smallbox->save();

   
    return redirect()->route('admin.transaction.small.index')
      ->withFlashSuccess('Operacion guardada con éxito');

    }

    public function update(SmallboxUpdateRequest $request)
    {

        $type = SmallBox::findOrFail($request->id);
        $type->update($request->all());

        return redirect()->route('admin.transaction.small.index')
          ->withFlashSuccess('Operacion actualizado con éxito');
    }

    public function destroy($id)
    {

        try {
            $income = SmallBox::findOrFail($id);
            $income->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.transaction.small.index')->withFlashSuccess('Operacion eliminada con éxito');
    }


}
