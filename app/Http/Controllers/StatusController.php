<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
{

    public function index()
    {
    	$status = Status::orderBy('level')
        ->paginate();
        $status_deleted = Status::onlyTrashed()->count();

    	return view('backend.settings.status.index', compact('status', 'status_deleted'));
    }

    public function trash()
    {
        $status = Status::orderBy('level')
        ->onlyTrashed()->paginate();
        return view('backend.settings.status.trash', compact('status'));
    }

    public function store(Request $request)
    {
    
        $this->validate($request, [
            'level' => 'required|integer|between:1,19|unique:statuses,level',
            'percentage' => 'required|integer|between:1,100',
            'to_add_users' => 'boolean',
        ]);

        $status = new Status();
        $status->name = $request->name;
        $status->description = $request->description;
        $status->level = $request->level;
        $status->percentage = $request->percentage;
        $status->to_add_users = $request->to_add_users ? 1 : 0;
        $status->save();

        return redirect()->route('admin.setting.status.index')
          ->withFlashSuccess('Configuracion guardada con éxito');
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'level' => 'required|integer|between:1,19|unique:statuses,level,'.$request->id,
            'percentage' => 'required|integer|between:1,100',
            'to_add_users' => 'boolean',
        ]);

        $status = Status::findOrFail($request->id);
        $status->update($request->all());

        return redirect()->route('admin.setting.status.index')
          ->withFlashSuccess('Configuracion actualizada con éxito');
    }


    public function addUsers($id)
    {
        $status = Status::find($id);
        if($status->to_add_users == false){
            $status->to_add_users = true;
        }
        else{
            $status->to_add_users = false;
        }

        $status->save();

        return redirect()->back()->withFlashSuccess('Cambio de agregar/desactivar usuarios definido con exito');

    }

    public function restore($id)
    {

        try {
            $status = Status::withTrashed()->where('id', $id);
            $status->restore();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_restore'));
        }


        return redirect()->route('admin.setting.status.index')->withFlashSuccess('Estatus restaurado con éxito');
    }


    public function destroy($id)
    {

        try {
            $status = Status::findOrFail($id);
            $status->update(['level' => null]);
            $status->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.setting.status.index')->withFlashSuccess('Configuracion eliminada con éxito');
    }

    public function select2LoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = Status::select(['id', 'name'])->where('name', 'like', '%' . $search . '%')->orderBy('level')->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }


}
