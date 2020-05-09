<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentMethod;
use App\SmallCard;
use App\Http\Requests\MethodRequest;
use App\Http\Requests\MethodUpdateRequest;

class PaymentMethodsController extends Controller
{
    public function index()
    {
    	$sections = PaymentMethod::orderBy('updated_at', 'desc')->paginate();
    	return view('backend.settings.method.index', compact('sections'));
    }

    public function store(MethodRequest $request)
    {
    
    $input = $request->all();
   	$section = PaymentMethod::create($input);
	
	return redirect()->route('admin.setting.method.index')
      ->withFlashSuccess('Método de pago guardado con éxito');

    }

    public function update(MethodUpdateRequest $request)
    {

        $type = PaymentMethod::findOrFail($request->id);
        $type->update($request->all());

        return redirect()->route('admin.setting.method.index')
          ->withFlashSuccess('Método de pago actualizado con éxito');
    }

    public function show($id)
    {
        $method = PaymentMethod::findOrFail($id);
        $sales = $method->sales()->with('products')->orderBy('updated_at', 'desc')->paginate(15, ['*'], 'sales');
        $cards = SmallCard::orderBy('updated_at', 'desc')->paginate(15, ['*'], 'cards');

        $cardsincome = SmallCard::whereType('1')->sum('amount');
        $cardsexpense = SmallCard::whereType('2')->sum('amount');

        return view('backend.settings.method.show', compact('method', 'sales', 'cards', 'cardsincome', 'cardsexpense'));
    }

    public function destroy($id)
    {

        try {
            $section = PaymentMethod::findOrFail($id);
            $section->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.setting.method.index')->withFlashSuccess('Método de pago eliminado con éxito');
    }

    public function select2LoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = PaymentMethod::select(['id', 'name'])->where('name', 'like', '%' . $search . '%')->orderBy('name')->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

}
