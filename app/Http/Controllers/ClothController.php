<?php

namespace App\Http\Controllers;

use App\Cloth;
use Illuminate\Http\Request;

class ClothController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Cloth::paginate();
        return view('backend.product.cloth.index', compact('colors'));
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
        $input = $request->all();
        $section = Cloth::create($input);
        
        return redirect()->route('admin.product.cloth.index')
          ->withFlashSuccess('Tela guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function show(Cloth $cloth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function edit(Cloth $cloth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cloth $cloth)
    {
        $color = Cloth::findOrFail($request->id);
        $color->update($request->all());

        return redirect()->route('admin.product.cloth.index')
          ->withFlashSuccess('Tela actualizada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function destroy($cloth)
    {
        try {
            $color = Cloth::findOrFail($cloth);
            $color->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.product.cloth.index')->withFlashSuccess('Tela eliminada con éxito');
    }

    public function select2LoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = Cloth::select(['id', 'name'])->where('name', 'like', '%' . $search . '%')->orderBy('name')->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

}
