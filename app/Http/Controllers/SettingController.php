<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{

   public function index()
    {
    	$settings = Setting::orderBy('updated_at', 'desc')
        ->paginate();
    	return view('backend.settings.general.index', compact('settings'));
    }

    public function store(Request $request)
    {
    
        $note = new Setting();
        $note->key = $request->key;
        $note->value = $request->value;
        $note->save();

        return redirect()->route('admin.setting.general.index')
          ->withFlashSuccess('Configuracion guardada con éxito');
    }

    public function update(Request $request)
    {

        $note = Setting::findOrFail($request->id);
        $note->update($request->all());

        return redirect()->route('admin.setting.general.index')
          ->withFlashSuccess('Configuracion actualizada con éxito');
    }

    public function destroy($id)
    {

        try {
            $note = Setting::findOrFail($id);
            $note->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.setting.general.index')->withFlashSuccess('Configuracion eliminada con éxito');
    }

}
