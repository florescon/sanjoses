<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SmallcardRequest;
use App\Http\Requests\SmallcardUpdateRequest;
use App\SmallCard;
use Carbon;

class SmallCardController extends Controller
{

    public function store(SmallcardRequest $request)
    {
    
		$smallbox = new SmallCard();
        $smallbox->name = $request->name;
        $smallbox->amount = $request->amount;
        $smallbox->comment = $request->comment;
        $smallbox->type = $request->type;
        $smallbox->save();

   
    return redirect()->route('admin.setting.method.show', 2)
      ->withFlashSuccess('Operacion guardada con éxito');

    }

    public function update(SmallcardUpdateRequest $request)
    {

        $type = SmallCard::findOrFail($request->id);
        $type->update($request->all());

        return redirect()->route('admin.transaction.small.index')
          ->withFlashSuccess('Operacion actualizado con éxito');
    }

    public function destroy($id)
    {

        try {
            $income = SmallCard::findOrFail($id);
            $income->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.setting.method.show', 2)->withFlashSuccess('Operacion eliminada con éxito');
    }


}
