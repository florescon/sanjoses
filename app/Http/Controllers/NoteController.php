<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Http\Requests\NoteRequest;
use App\Http\Requests\NoteUpdateRequest;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{


    public function index()
    {
    	$notes = Note::orderBy('updated_at', 'desc')
        ->where('type', 1)
        ->paginate();
    	return view('backend.note.index', compact('notes'));
    }

    public function indexpersonal()
    {
        $notes = Note::orderBy('updated_at', 'desc')->where('type', 2)->where('audi_id', Auth::id())->paginate();
        return view('backend.note.index', compact('notes'));
    }

    public function store(NoteRequest $request)
    {
    
        $note = new Note();
        $note->content = $request->content;
        $note->audi_id = Auth::id();
        $note->type = $request->type;
        $note->save();

        if($request->type ==1){
        	return redirect()->route('admin.note.index')
              ->withFlashSuccess('Nota guardada con éxito');
        }
        else{
            return redirect()->route('admin.note.indexpersonal')
              ->withFlashSuccess('Nota guardada con éxito');
        }
    }

    public function update(NoteUpdateRequest $request)
    {

        $note = Note::findOrFail($request->id);
        $note->update($request->all());

        if($note->type ==1){
            return redirect()->route('admin.note.index')
              ->withFlashSuccess('Nota actualizada con éxito');
        }
        else{
            return redirect()->route('admin.note.indexpersonal')
              ->withFlashSuccess('Nota actualizada con éxito');
        }
    }

    public function search(Request $request){
        $searching = $request->input('search');

        //now get all user and services in one go without looping using eager loading
            //In your foreach() loop, if you have 1000 users you will make 1000 queries
          $notes = Note::where('content','like','%'.$searching.'%')->where('type', 1)->orderBy('id')->paginate(15);
            return view('backend.note.index', compact('notes'));
    }


    public function destroy($id)
    {

        try {
            $note = Note::findOrFail($id);
            $note->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.note.index')->withFlashSuccess('Nota eliminada con éxito');
    }

}
