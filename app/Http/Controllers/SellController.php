<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User;
use App\Sale;
use App\Cart;
use App\Product;
use App\ColorSizeProduct;
use App\ProductSale;
use App\PaymentMethod;
use App\Status;
use DB;
use PDF;

class SellController extends Controller
{

    public function index()
    {
        $sales = Sale::orderBy('updated_at', 'desc')->where('type', 1)->paginate();
        return view('backend.inventory.sell.index', compact('sales'));
    }

    public function create()
    {
        $products = Cart::with('product')->where('audi_id', Auth::id())->where('sale_order', 0)->get();
        $payments = PaymentMethod::all();
        // dd($products);
        return view('backend.inventory.sell.create', compact('products', 'payments'));
    }

    public function storeCart(Request $request)
    {
        $this->validate($request, [
            'product' => 'required',
            'quantity' => 'required|required|not_in:0',
        ]);

        $product = ColorSizeProduct::where(['id'=>$request->product])->first();

        if($product->stock<$request->quantity){
            return redirect()->back()->withFlashDanger('Cantidad menor a la existente');
        }
        $dup = DB::table('carts')->where(['product_id'=>$request->product])->where('audi_id', Auth::id())->where('sale_order', 0)->count();
        if($dup>=1){
            return redirect()->back()->withFlashDanger('Producto duplicado');
        }

        $cart = new Cart();
        $cart->product_id = $request->product;
        $cart->quantity = $request->quantity;
        $cart->audi_id = Auth::id();
        $cart->save();

        return redirect()->route('admin.inventory.sell.create')
          ->withFlashSuccess('Producto agregado con éxito');
    }   

    public function destroyCart($id)
    {

        try {
            $cart = Cart::findOrFail($id);
            $cart->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.inventory.sell.create')->withFlashSuccess('Producto eliminado con éxito');
    }


    public function destroyAllCart()
    {

        try {
            $cart = Cart::where('audi_id', Auth::id())->where('sale_order', 0);
            $cart->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.inventory.sell.create')->withFlashSuccess('Listado eliminado con éxito');
    }


    public function store(Request $request)
    {

        $products = Cart::with('product')->where('audi_id', Auth::id())->where('sale_order', 0)->get();

        try {
            $sell = new Sale();
            $sell->user_id = $request->user;
            $sell->ticket_text = $request->ticket_text;
            $sell->payment_method_id = $request->payment;
            $sell->audi_id = Auth::id();
            $sell->type = 1;
            $sell->save();

            foreach ($products as $entry) {


                $product = ColorSizeProduct::find($entry->product_id);
                if(isset($product->stock)){
                    $product->decrement('stock', $entry->quantity);
                }
                ProductSale::create([
                    'sale_id' => $sell->id,
                    'product_id' => $entry->product_id,
                    'quantity' => $entry->quantity,
                    'price' => $entry->price
                ]);
            }
            // $sell->sale()->attach($products);
            DB::table('carts')->where('audi_id', Auth::id())->where('sale_order', 0)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger('Error');

        }
        return redirect()->route('admin.inventory.sell.create')
          ->withFlashSuccess('Venta realizada con éxito');
    }


    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        return view('backend.inventory.sell.show', compact('sale'));
    }



    public function latestSell(){
        $latest = Sale::latest('created_at')->where('type', 1)->first();
        try{       
            return $this->generatePDF($latest->id);
        }catch (\Exception $e) {
            return redirect()->back()->withFlashDanger('No se puede imprimir');
        }

    }

    public function generatePDF($id)
    {
        $data = ['title' => 'Bienvenido a '];
        // $pdf = PDF::loadView('mypdf', $data);
        $sale = Sale::with('products', 'products.product_detail')->findOrFail($id);

        $pdf = PDF::setOption('page-height', '367.7')->setOption('page-width', '80')->setOption('margin-right', '0.5')->setOption('margin-left', '0.5')->setOption('margin-top', '4')->loadView('sale', compact('data', 'sale'));

        return $pdf->stream($sale->id.'-venta.pdf');
    }


    public function generatePDFmaterial($id)
    {
        $data = ['title' => 'Bienvenido a '];
        // $pdf = PDF::loadView('mypdf', $data);
        $sale = Sale::with('products', 'products.product_detail')->findOrFail($id);

        $sale_material = Sale::with(['material_product_sale' => function($query){
                    $query->groupBy('material_id')->selectRaw('*, sum(quantity) as sum');
                }]
        )->findOrFail($id);

        $customPaper = array(0,0,667.00,283.80);
        $pdf = PDF::setOption('page-height', '367.7')->setOption('page-width', '80')->setOption('margin-right', '0.5')->setOption('margin-left', '0.5')->setOption('margin-top', '4')->loadView('material', compact('data', 'sale', 'sale_material'));

        return $pdf->stream($sale->id.'-venta.pdf');
    }


    public function generatePDFproductbystaff($sale_id, $staff, $folio_id, $status_id)
    {
        $data = ['title' => 'Bienvenido a '];
        // $pdf = PDF::loadView('mypdf', $data);
        $sale = Sale::with('product_sale_staff_main_')->findOrFail($sale_id);

        $sale_product_by_staff = Sale::with(['product_sale_staff_main_.product_stock.product_detail', 
            'product_sale_staff_main_' => function ($query) use ($staff, $status_id) {
                $query->where('user_id', $staff)->where('status_id', $status_id);
            }
        ])->findOrFail($sale_id);

        $status = Status::where('id', $status_id)->first();
        $folio = $folio_id;
        $user = User::where('id', $staff)->first();

        $customPaper = array(0,0,667.00,283.80);
        $pdf = PDF::setOption('page-height', '0.5m')->setOption('page-width', '80')->setOption('margin-right', '0.5')->setOption('margin-left', '0.5')->setOption('margin-top', '4')->loadView('productbystaff', compact('sale', 'sale_product_by_staff', 'folio', 'status', 'user'));

        return $pdf->stream($sale->id.'-venta.pdf');
    }


    public function search(Request $request){
        $searching = $request->input('search');

        //now get all user and services in one go without looping using eager loading
            //In your foreach() loop, if you have 1000 users you will make 1000 queries
          $sales = Sale::where('id','like','%'.$searching.'%')->orderBy('id')->paginate(15);
            return view('backend.inventory.sell.index', compact('sales'));
    }


    public function destroy($id)
    {
        $products = ProductSale::where('sale_id', $id)->get();
        try {

            foreach ($products as $entry) {

                $prod = Product::find($entry->product_id);
                if($prod->type==1){
                    $prod->increment('quantity', $entry->quantity);
                }
            }

            $delete = Sale::findOrFail($id);
            $delete->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }

        return redirect()->route('admin.inventory.sell.index')->withFlashSuccess('Venta eliminada con éxito');
    }


}
