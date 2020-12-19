<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataTables\FinalOrdersDataTable;
use App\FinalOrder;
use App\ProductFinalOrder;
use App\Cart;
use App\PaymentMethod;
use App\StockRevision;
use App\StockRevisionLog;
use DB;
use PDF;
use Carbon;

class FinalOrderController extends Controller
{

    public function index(FinalOrdersDataTable $dataTable)
    {
        return $dataTable->render('backend.finalorder.index');
    }

    public function create()
    {
        $products = Cart::with('product')->where('audi_id', Auth::id())->where('sale_order', 2)->get();
        $payments = PaymentMethod::all();
        // dd($products);
        return view('backend.finalorder.create', compact('products', 'payments'));
    }



    public function store(Request $request)
    {

        $dup = DB::table('carts')->where(function($query){
            return $query
            ->whereNull('quantity')
            ->orWhere('quantity', 0);
        })->where('audi_id', Auth::id())->where('sale_order', 2)->count();
            
        if($dup>=1){
            return redirect()->back()->withFlashDanger('Cantidades pendiendes por asignar');
        }


        $products = Cart::where('audi_id', Auth::id())->where('sale_order', 2)->get();
        try {
            $sell = new FinalOrder();
            $sell->user_id = $request->user;
            $sell->comment = $request->comment;
            $sell->payment_method_id = $request->payment;
            $sell->audi_id = Auth::id();
            $sell->type = 2;
            $sell->date_entered = $request->date_entered ?  $request->date_entered : Carbon::now()->format('d-m-Y');
            $sell->save();

            foreach ($products as $product) {

                ProductFinalOrder::create([
                    'final_order_id' => $sell->id,
                    'product_id' => $product->product_id,
                    'quantity' => $product->quantity,
                    'price' => $product->price
                ]);

                $product_id_log = StockRevision::where('product_id', $product->product_id)->first();
                $product_id_log->decrement('quantity', abs($product->quantity));


                $revision_log = new StockRevisionLog();
                $revision_log->final_order_id = $sell->id;
                // $revision_log->product_sale_id = $product->product_sale;
                $revision_log->product_id = $product->product_id;
                $revision_log->quantity = $product->quantity;
                $revision_log->type = 2;
                $revision_log->saveOrFail();

            }
            // $sell->sale()->attach($products);
            DB::table('carts')->where('audi_id', Auth::id())->where('sale_order', 2)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger('Error');

        }
        return redirect()->route('admin.finalorder.create')
          ->withFlashSuccess('Orden realizada con éxito');
    }



    public function storeCart(Request $request)
    {
        $this->validate($request, [
            'product' => 'required',
        ]);
        

        $products = $request->product;

        foreach ($products as $product) {
            $cart = Cart::firstOrCreate([
                'product_id' => $product,
                'audi_id' => Auth::id(),
                'sale_order' => 2
            ]);
            $cart->save();
        }

        return redirect()->route('admin.finalorder.create')
          ->withFlashSuccess('Producto del almacén intermedio agregado con éxito');
    }   



    public function updateQuantitiesCart(Request $request)
    {
        $this->validate($request, [
            'quantities' => 'required',
        ]);

        $products_cart = $request->hid;

        foreach ($products_cart as $key => $product_update) {
            Cart::where([
                'id' => $product_update, 
              ])
              ->update([
                'quantity'=> $request->quantities[$key]
            ]);
        }

        return redirect()->route('admin.finalorder.create')
          ->withFlashSuccess('Cantidades actualizadas con éxito');
    }


    public function generatePDF($id)
    {
        $data = ['title' => 'Bienvenido a '];
        // $pdf = PDF::loadView('mypdf', $data);
        $sale = FinalOrder::findOrFail($id);

        $format["title"] = "A4";
        $pdf = PDF::setOption('page-height', '367.7')->setOption('page-width', '80')->setOption('margin-right', '0.5')->setOption('margin-left', '0.5')->setOption('margin-top', '4')->loadView('finalorder', compact('data', 'sale'), [], $format);

        return $pdf->stream($sale->id.'-finalorder.pdf');
    }


    public function destroyCart($id)
    {

        try {
            $cart = Cart::findOrFail($id);
            $cart->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.finalorder.create')->withFlashSuccess('Producto eliminado con éxito');
    }


    public function destroyAllCart()
    {

        try {
            $cart = Cart::where('audi_id', Auth::id())->where('sale_order', 2);
            $cart->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.finalorder.create')->withFlashSuccess('Listado eliminado con éxito');
    }



    public function destroy($id)
    {
        // $products = ProductFinalOrder::where('sale_id', $id)->get();
        try {

            $sale = FinalOrder::with('products')->findOrFail($id);

            $products = ProductFinalOrder::where('final_order_id', $id)->get();
            foreach($products as $product){
                $product_id_log = StockRevision::where('product_id', $product->product_id)->first();
                $product_id_log->increment('quantity', abs($product->quantity));


                $revision_log = new StockRevisionLog();
                $revision_log->final_order_id = $id;
                $revision_log->product_id = $product->product_id;
                $revision_log->quantity = $product->quantity;
                $revision_log->type = 1;
                $revision_log->saveOrFail();

            }

            // $sale->products()->detach();

            //falta history

            $sale->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }

        return redirect()->route('admin.finalorder.index')->withFlashSuccess('Venta eliminada con éxito');
    }


}
