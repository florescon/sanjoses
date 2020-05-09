<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;
use PDF;
use DataTables;
use Carbon;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $colors = Color::paginate();
        // return view('backend.product.color.index', compact('colors'));

       if ($request->ajax()) {
            // select('id', 'name', 'address', 'created_at', 'updated_at')
            $data = Color::query();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($dat) {
                        return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
                    })
                    ->editColumn('update', function ($dat) {
                        return $dat->update ? with(new Carbon($dat->update))->format('d-m-Y H:i:s') : '';
                    })
                    ->addColumn('action', function($row){
                           $btn = '

                                <div class="btn-group" role="group" aria-label=" '. __('labels.backend.access.users.user_actions') .' ">

                                    <a href="#" data-toggle="modal" data-placement="top" title=" '.__('buttons.general.crud.edit') .'" class="btn btn-primary" data-id="'. $row->id .'" data-myname="'. $row->name .'" data-target="#editTag"><i class="fas fa-edit"></i></a>

                                     <a href="'. route('admin.product.color.destroy', $row->id) .'" class="btn btn-delete btn-outline-danger" title="'.$row->name.'" data-trans-button-confirm="'. __('buttons.general.crud.delete').'"  data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-text="'.__('strings.backend.general.revert_this').'" data-trans-title="'.__('strings.backend.general.are_you_sure_delete').'" data-trans-success="'.__('strings.backend.general.success').'" data-trans-deleted="'.__('strings.backend.general.deleted').'" data-trans-wrong="'.__('strings.backend.general.wrong').'"><i class="fas fa-trash"></i>
                                    </a>
                                </div>    
                            ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('backend.product.color.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {

        $input = $request->all();
        $section = Color::create($input);
        
        return redirect()->route('admin.product.color.index')
          ->withFlashSuccess('Color guardado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $color = Color::findOrFail($request->id);
        $color->update($request->all());

        return redirect()->route('admin.product.color.index')
          ->withFlashSuccess('Color actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy($col)
    {

        try {
            $color = Color::findOrFail($col);
            $color->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.product.color.index')->withFlashSuccess('Color eliminado con éxito');

    }

    public function select2LoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = Color::select(['id', 'name'])->where('name', 'like', '%' . $search . '%')->orderBy('name')->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

}
