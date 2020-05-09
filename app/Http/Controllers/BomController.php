<?php

namespace App\Http\Controllers;

use App\Bom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\Cart;
use App\Product;
use App\ColorSizeProduct;
use App\ProductSale;
use App\PaymentMethod;
use DB;
use PDF;

class BomController extends Controller
{

    public function create($id)
    {
        $materials = Bom::with('material')->where('product_id', $id)->get();
        $payments = PaymentMethod::all();
        $product = Product::find($id);

        // dd($products);
        return view('backend.product.bom.create', compact('materials', 'payments', 'product'));
    }

    public function storeCart(Request $request, $id)
    {
        $this->validate($request, [
            'product' => 'required',
            'quantity' => 'required|required|not_in:0',
        ]);
        
        $dup = DB::table('boms')->where(['material_id'=>$request->product])->where('product_id', $id)->count();
        
        if($dup>=1){
            return redirect()->back()->withFlashDanger('Material duplicado');
        }

        $cart = new Bom();
        $cart->product_id = $id;
        $cart->material_id = $request->product;
        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->back()->withFlashSuccess('Material agregado con éxito');
    }   

    public function destroyCart($id)
    {

        try {
            $cart = Bom::findOrFail($id);
            $cart->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->back()->withFlashSuccess('Material eliminado con éxito');
    }



}
