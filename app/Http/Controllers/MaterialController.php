<?php

namespace App\Http\Controllers;

use App\Material;
use App\Unit;
use App\MaterialHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DataTables;
use Carbon;
use App\DataTables\MaterialsDataTable;
use App\DataTables\MaterialHistoryDataTable;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MaterialsDataTable $dataTable)
    {
        // if ($request->ajax()) {
        //     $data = Material::query()->with('unit');
            
            // if(request('start_date') && request('end_date')){
            //     $dataTable->whereBetween('updated_at', [request('start_date'), request('end_date')]);
            //     // $data->whereBetween('updated_at', array(request('from_date'), request('end_date')))
            //     // ->get();
            // }

        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->editColumn('created_at', function ($dat) {
        //                 return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
        //             })
        //             ->editColumn('updated_at', function ($dat) {
        //                 return $dat->updated_at ? with(new Carbon($dat->updated_at))->format('d-m-Y H:i:s') : '';
        //             })
        //             ->addColumn('unit', function (Material $material) {
        //                     return !empty($material->unit->name) ? $material->unit->name : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>';
        //             })
        //             ->addColumn('action', function($row){
   
        //                    $btn = '
        //                     <div class="btn-group" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">

        //                        <a href="#" data-toggle="modal" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary" data-id="'.$row->id.'" data-mypart_number="'. $row->part_number .'" data-myname="'.$row->name.'" data-mydescription="'.$row->description.'" data-myprice="'. $row->price .'" data-mystock="'. $row->stock .'" data-myunit="'. $row->unit_id .'" data-target="#editService"><i class="fas fa-edit"></i></a>';
        //                        $btn = $btn. '
        //                         <a href="'.route('admin.material.destroy', $row->id).'" class="btn btn-delete btn-danger" title="'.$row->name.'" data-trans-button-confirm="'. __('buttons.general.crud.delete').'"  data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-text="'.__('strings.backend.general.revert_this').'" data-trans-title="'.__('strings.backend.general.are_you_sure_delete').'" data-trans-success="'.__('strings.backend.general.success').'" data-trans-deleted="'.__('strings.backend.general.deleted').'" data-trans-wrong="'.__('strings.backend.general.wrong').'"><i class="fas fa-eraser"></i>
        //                         </a>
        //                     </div>

        //                    ';
     
        //                     return $btn;
        //             })
        //             ->rawColumns(['action', 'unit'])
        //             ->make(true);
        // }

        return $dataTable->render('backend.material.index');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $material = new Material;
        $material->part_number = $request->part_number;
        $material->name = $request->name;
        $material->description = $request->description;
        $material->acquisition_cost = $request->acquisition_cost;
        $material->price = $request->price;
        $material->stock = $request->stock; 
        $material->unit_id = $request->unit;
        $material->color_id = $request->color;
        $material->size_id = $request->size;
        $material->save();
                
        return redirect()->route('admin.material.index')
          ->withFlashSuccess('Materia prima guardada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::with('unit', 'color', 'size')->findOrFail($id);
        return view('backend.material.edit', compact('material'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $service = Material::findOrFail($request->id);
        $service->update($request->all());

        return redirect()->route('admin.material.index')
          ->withFlashSuccess('Materia prima actualizada con éxito');
    }

    public function history(MaterialHistoryDataTable $dataTable)
    {
        return $dataTable->render('backend.material.history');
    }

    public function addstock(Request $request)
    {
        $this->validate($request, [
            'stock_' => 'required',
        ]);
        $product = Material::findOrFail($request->material);
        $actualstock = $product->stock;
        $product->stock = $actualstock  + $request->stock_;
        if ($product->update()) {
            $log = new MaterialHistory();
            $log->material_id = $product->id;
            $log->old_quantity = $actualstock;
            $log->quantity = $request->stock_;
            $log->type = 1;
            $log->audi_id = Auth::id();
            $log->saveOrFail();
            return redirect()->route('admin.materialhistory.index')->withFlashSuccess('Cantidad actualizada con exito');
        } else {
            return redirect()->route('admin.materialhistory.index')->withFlashDanger('Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $service = Material::findOrFail($id);
            $service->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }

        return redirect()->route('admin.material.index')->withFlashSuccess('Materia prima eliminada con éxito');
    }

    public function select2LoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = Material::with('unit', 'color', 'size')
        ->where('name', 'like', '%' . $search . '%')->orWhere('part_number', 'like', '%' . $search . '%')->orderBy('name')
        ->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }


}
