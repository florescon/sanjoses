<?php

namespace App\Http\Controllers;

use App\Bom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\Cart;
use App\Product;
use App\Size;
use App\SizeBom;
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
        $product = Product::with('color_size_product', 'sizes')->find($id);

        // dd($products);
        return view('backend.product.bom.create', compact('materials', 'payments', 'product'));
    }


    public function addtosize($productid, $sizeid)
    {
        $materials = SizeBom::with('material')->where('product_id', $productid)->where('size_id', $sizeid)->get();
        $payments = PaymentMethod::all();
        $product = Product::with('color_size_product', 'sizes')->find($productid);
        $size = Size::find($sizeid);

        // dd($products);
        return view('backend.product.bom.create_bysize', compact('materials', 'payments', 'product', 'size'));
    }


    public function storeAddtosize(Request $request, $productid, $sizeid)
    {
        

        $this->validate($request, [
            'product' => 'required',
            'quantity' => 'required|required|not_in:0',
        ]);
        
        $dup = DB::table('size_boms')->where(['material_id'=>$request->product])->where('product_id', $productid)->where('size_id', $sizeid)->count();
        
        if($dup>=1){
            return redirect()->back()->withFlashDanger('Material duplicado');
        }

        $cart = new SizeBom();
        $cart->product_id = $productid;
        $cart->material_id = $request->product;
        $cart->size_id = $sizeid;
        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->back()->withFlashSuccess('Material agregado con éxito');

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


    public function destroyCartBysize($id)
    {

        try {
            $cart = SizeBom::findOrFail($id);
            $cart->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->back()->withFlashSuccess('Material eliminado con éxito');
    }


}
