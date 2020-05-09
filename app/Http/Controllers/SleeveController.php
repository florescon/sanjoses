<?php

namespace App\Http\Controllers;

use App\Sleeve;
use Illuminate\Http\Request;

class SleeveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Sleeve::paginate();
        return view('backend.product.sleeve.index', compact('colors'));
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
        $section = Sleeve::create($input);
        
        return redirect()->route('admin.product.sleeve.index')
          ->withFlashSuccess('Manga guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sleeve  $sleeve
     * @return \Illuminate\Http\Response
     */
    public function show(Sleeve $sleeve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sleeve  $sleeve
     * @return \Illuminate\Http\Response
     */
    public function edit(Sleeve $sleeve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sleeve  $sleeve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sleeve $sleeve)
    {
        $color = Sleeve::findOrFail($request->id);
        $color->update($request->all());

        return redirect()->route('admin.product.sleeve.index')
          ->withFlashSuccess('Manga actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sleeve  $sleeve
     * @return \Illuminate\Http\Response
     */
    public function destroy($sleeve)
    {
        try {
            $color = Sleeve::findOrFail($sleeve);
            $color->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.product.sleeve.index')->withFlashSuccess('Manga eliminada con éxito');

    }

    public function select2LoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = Sleeve::select(['id', 'name'])->where('name', 'like', '%' . $search . '%')->orderBy('name')->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

}
