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
use App\ClothBoms;
use App\SizeClothBoms;
use DB;
use PDF;

class BomController extends Controller
{

    public function create($id)
    {
        $materials = Bom::with('material')->where('product_id', $id)->get();
        $product = Product::with('cloth_material', 'sizes.material_bysize')->find($id);

        return view('backend.product.bom.create', compact('materials', 'product'));
    }


    public function addtosize($productid, $sizeid)
    {
        $materials = SizeBom::where('product_id', $productid)->where('size_id', $sizeid)->get();
        $product = Product::with('color_size_product', 'sizes')->find($productid);

        $cloth = SizeClothBoms::where('product_id', $productid)->where('size_id', $sizeid)->first();
        
        $size = Size::find($sizeid);

        return view('backend.product.bom.create_bysize', compact('materials', 'product', 'size', 'cloth'));
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

    public function storeCloth(Request $request, $id){

        $this->validate($request, [
            'quantity' => 'required|required|not_in:0',
        ]);

        $product = new ClothBoms;
        $product->product_id = $id;
        $product->quantity = $request->quantity;
        $product->save();

        return redirect()->back()->withFlashSuccess('Consumo de tela guardado');

    }

    public function updateCloth(Request $request)
    {
        $updatecloth = ClothBoms::findOrFail($request->id);
        $updatecloth->update($request->all());

        return redirect()->back()
          ->withFlashSuccess('Consumo de tela actualizado con éxito');
    }


    public function storeClothSize(Request $request, $productid, $sizeid){

        $this->validate($request, [
            'quantity' => 'required|required|not_in:0',
        ]);
        
        $dup = DB::table('size_cloth_boms')->where('product_id', $productid)->where('size_id', $sizeid)->count();
        
        if($dup>=1){
            return redirect()->back()->withFlashDanger('Consumo ya agregado');
        }

        $cart = new SizeClothBoms();
        $cart->product_id = $productid;
        $cart->size_id = $sizeid;
        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->back()->withFlashSuccess('Consumo de tela agregada con éxito');
    }

    public function updateClothSize(Request $request)
    {
        $updatecloth = SizeClothBoms::findOrFail($request->id);
        $updatecloth->update($request->all());

        return redirect()->back()
          ->withFlashSuccess('Consumo de tela actualizado con éxito');
    }



    public function bomMainDuplicate(Request $request)
    {


        $actualmaterials = SizeBom::where('product_id', $request->product)->where('size_id', $request->size)->get();

        if($actualmaterials->count()){
            foreach($actualmaterials as $actualmaterial){
                $actualmaterial->delete();            
            }

        }

        $materials = Bom::where('product_id', $request->product)->get();
        foreach($materials as $material){
            $clone = $material->replicate();
            $clone->size_id = $request->size;
            $clone->setTable('size_boms')->save();
        }

        return redirect()->back()->withFlashSuccess('Material replicado con éxito');

    }    


    public function bomMainDelete(Request $request)
    {


        $actualmaterials = SizeBom::where('product_id', $request->product)->where('size_id', $request->size)->get();

        if($actualmaterials->count()){
            foreach($actualmaterials as $actualmaterial){
                $actualmaterial->delete();            
            }

        }

        return redirect()->back()->withFlashSuccess('Material eliminado con éxito');

    }    


    public function updateconsumption(Request $request, SizeBom $color)
    {
        $color = SizeBom::findOrFail($request->id);
        $color->update($request->all());

        return redirect()->back()
          ->withFlashSuccess('Consumo actualizado con éxito');
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
