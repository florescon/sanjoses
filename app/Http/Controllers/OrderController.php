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
use App\Bom;
use App\Status;
use App\Material;
use App\MaterialProductSale;
use App\MaterialProductSaleHistory;
use App\MaterialProductSaleUser;
use DB;
use PDF;
use DataTables;
use App\DataTables\OrdersDataTable;
use Carbon;

class OrderController extends Controller
{

    public function index(OrdersDataTable $dataTable)
    {

        // $sales = Sale::orderBy('updated_at', 'desc')->with('user', 'payment', 'products', 'generated_by')->where('type', 2)->paginate();

        // if ($request->ajax()) {
        //     $data = Sale::query()->with('user', 'payment', 'products', 'generated_by')->where('type', 2);
            
        //     if(request('start_date') && request('end_date')){
        //         $data->whereBetween('created_at', [request('start_date'), request('end_date')]);
        //         // $data->whereBetween('updated_at', array(request('from_date'), request('end_date')))
        //         // ->get();
        //     }

        //     return Datatables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('user', function (Sale $order) {
        //                     return !empty($order->user_id) ? $order->user->name  : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>';
        //             })
        //             ->addColumn('payment', function (Sale $order) {
        //                     return !empty($order->payment_method_id) ? $order->payment->name  : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>';

        //             })
        //             ->addColumn('generated_by', function (Sale $order) {
        //                     return !empty($order->audi_id) ? $order->generated_by->name.' '.$order->generated_by->last_name  : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>';

        //             })
        //             ->addColumn('action', function($row){

        //                 $btn = '<div class="btn-group" role="group" aria-label="'. __('labels.backend.access.users.user_actions') .'">

        //                         <a href="'. route('admin.order.show', $row->id) .'" data-toggle="tooltip" data-placement="top" title="'. __('buttons.general.crud.view') .'" class="btn btn-info"><i class="fas fa-eye"></i></a>

        //                         <a href="'. route('admin.order.generate', $row->id) .'" data-toggle="tooltip" data-placement="top" title="'. __('buttons.general.crud.print') .'" class="btn btn-outline-info" target="_blank"><i class="fas fa-print"></i></a>

        //                             <a href="'. route('admin.order.destroy', $row->id) .'" class="btn btn-danger" data-method="delete" title="'.__('buttons.general.crud.delete') .'" data-trans-button-cancel="'. __('buttons.general.cancel') .'" data-trans-button-confirm="'. __('buttons.general.crud.delete') .'" data-trans-title="'. __('strings.backend.general.are_you_sure') .'">
        //                                  <i class="fas fa-eraser"></i>
        //                             </a>
        //                         ';
        //                         return $btn;
        //             })
        //             ->rawColumns(['user', 'payment', 'generated_by', 'action'])
        //             ->make(true);

        // }

        // return view('backend.order.index');

        return $dataTable->render('backend.order.index');

    }


    public function process()
    {

        $list = array('fa-evernote', 'fa-firefox-browser', 'fa-digital-ocean', 'fa-whatsapp', 'fa-wolf-pack-battalion', 'fa-youtube', 'fa-tumblr', 'fa-gratipay', 'fa-earlybirds', 'fa-free-code-camp', 'fa-canadian-maple-leaf', 'fa-linux', 'fa-apple', 'fa-apple');
        shuffle($list);

        $orders = Sale::with('status')->where('type', 2)->whereDoesntHave('status', function ($query) {
            $query->where('level', 'like', 10);
        })->orderBy('created_at', 'desc')->paginate();


        return view('backend.order.process', compact('list', 'orders'));

    }


    public function create()
    {
        $products = Cart::with('product')->where('audi_id', Auth::id())->where('sale_order', 1)->get();
        $payments = PaymentMethod::all();
        // dd($products);
        return view('backend.order.create', compact('products', 'payments'));
    }

    public function storeCart(Request $request)
    {
        $this->validate($request, [
            'product' => 'required',
            'quantity' => 'required|required|not_in:0',
        ]);
        
        $dup = DB::table('carts')->where(['product_id'=>$request->product])->where('audi_id', Auth::id())->where('sale_order', 1)->count();
            
        if($dup>=1){
            return redirect()->back()->withFlashDanger('Producto duplicado');
        }

        $cart = new Cart();
        $cart->product_id = $request->product;
        $cart->quantity = $request->quantity;
        $cart->audi_id = Auth::id();
        $cart->sale_order = 1;
        $cart->save();

        return redirect()->route('admin.order.create')
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


        return redirect()->route('admin.order.create')->withFlashSuccess('Producto eliminado con éxito');
    }


    public function destroyAllCart()
    {

        try {
            $cart = Cart::where('audi_id', Auth::id())->where('sale_order', 1);
            $cart->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.order.create')->withFlashSuccess('Listado eliminado con éxito');
    }

    public function store(Request $request)
    {

        $products = Cart::with('boms')->where('audi_id', Auth::id())->where('sale_order', 1)->get();
        try {
            $sell = new Sale();
            $sell->user_id = $request->user;
            $sell->ticket_text = $request->ticket_text;
            $sell->comment = $request->comment;
            $sell->payment_method_id = $request->payment;
            $sell->audi_id = Auth::id();
            $sell->type = 2;
            $sell->date_entered = $request->date_entered ?  $request->date_entered : Carbon::now()->format('d-m-Y');
            $sell->save();

            if(isset($request->status)){
                $sell->status()->attach($request->status, ['audi_id' => Auth::id()]);
            }
            else{ 
                $sell->status()->attach(1, ['audi_id' => Auth::id()]);   
            }

            foreach ($products as $product) {

                $producto = $product->product->product_id;
                $size = $product->product->size_id;

                if($product->product->cloth_material_id){
                    if($product->bom_bysizecloth->whereIn('product_id', $producto)->whereIn('size_id', $size)->count()){
                        foreach($product->bom_bysizecloth as $bom){

                            MaterialProductSale::create([
                                    'sale_id' => $sell->id,
                                    'material_id' => $product->product->cloth_material_id,
                                    'product_id' => $product->product_id,
                                    'quantity' => $product->quantity * $bom->quantity,
                                ]);
                        }
                    }
                    else{
                        foreach($product->bom_cloth as $bom){
                            MaterialProductSale::create([
                                        'sale_id' => $sell->id,
                                        'material_id' => $product->product->cloth_material_id,
                                        'product_id' => $product->product_id,
                                        'quantity' => $product->quantity * $bom->quantity,
                            ]);
                        }
                    }
                }

                if($product->boms_bysize->whereIn('product_id', $producto)->whereIn('size_id', $size)->count()){
                    foreach($product->boms_bysize as $bom){
                        if($bom->size_id == $size){
                            MaterialProductSale::create([
                                'sale_id' => $sell->id,
                                'material_id' => $bom->material_id,
                                'product_id' => $product->product_id,
                                'quantity' => $product->quantity * $bom->quantity,
                            ]);

                            $product_decrement = Material::find($bom->material_id);
                            $product_decrement->decrement('stock', $product->quantity * $bom->quantity);
                        }
                    }
                }
                else {
                    foreach($product->boms as $bom){
                        MaterialProductSale::create([
                            'sale_id' => $sell->id,
                            'material_id' => $bom->material_id,
                            'product_id' => $product->product_id,
                            'quantity' => $product->quantity * $bom->quantity,
                        ]);

                        $product_decrement = Material::find($bom->material_id);
                        $product_decrement->decrement('stock', $product->quantity * $bom->quantity);
                    }
                }


                ProductSale::create([
                    'sale_id' => $sell->id,
                    'product_id' => $product->product_id,
                    'quantity' => $product->quantity,
                    'price' => $product->price
                ]);
            }
            // $sell->sale()->attach($products);
            DB::table('carts')->where('audi_id', Auth::id())->where('sale_order', 1)->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger('Error');

        }
        return redirect()->route('admin.order.create')
          ->withFlashSuccess('Orden realizada con éxito');
    }


    public function show($id)
    {

        $sale = Sale::with('products.product_detail.product_detail', 'products.product_detail.product_detail_size', 'products.product_detail.product_detail_color', 'material_product_sale', 'products.boms')->findOrFail($id);

        $sale_material = Sale::with(['material_product_sale.material.unit', 'material_product_sale' => function($query){
                    $query->groupBy('material_id')->selectRaw('*, sum(quantity) as sum');
                }]
        )->findOrFail($id);

        $statuses = Status::all();

        return view('backend.order.show', compact('sale', 'statuses', 'sale_material'));
    }



    public function reintegrate($id)
    {

        $sale = Sale::with('products', 'material_product_sale', 'products.boms')->findOrFail($id);
        return view('backend.order.reintegrate', compact('sale'));
    }


    public function reintegrateproduct($id_product)
    {

        $product = ProductSale::find($id_product);
        if($product->reintegrate == false){
            $product_increment = ColorSizeProduct::find($product->product_id);
            $product_increment->increment('stock', abs($product->quantity));
            $product_reintegrated = ProductSale::where('id', $id_product)->update(['reintegrate' => 1]);
        }

        return redirect()->back()->withFlashSuccess('Producto reintegrado con éxito');
    }   

    public function reintegrateallproducts($id_order)
    {

        $sale_products = Sale::with('products')->where('id', $id_order)->first();

        foreach($sale_products->products as $product){

            if($product->reintegrate == false){
                $product_increment = ColorSizeProduct::find($product->product_id);
                $product_increment->increment('stock', abs($product->quantity));
                $product_reintegrated = ProductSale::where('id', $product->id)->update(['reintegrate' => 1]);
            }
        }

        return redirect()->back()->withFlashSuccess('Productos reintegrados con éxito');
    }   

    public function addmaterial(Request $request)
    {
        $this->validate($request, [
            'stock_' => 'required',
        ]);
        $product = MaterialProductSale::findOrFail($request->id);
        $actualquantity = $product->quantity;
        $product->quantity = $actualquantity  + $request->stock_;
        if ($product->update()) {
            $log = new MaterialProductSaleHistory();
            $log->material_product_sale_id = $product->id;
            $log->old_quantity = $actualquantity;
            $log->quantity = $request->stock_;
            $log->type = 1;
            $log->audi_id = Auth::id();
            $log->saveOrFail();

            $material_update_stock = Material::withTrashed()->find($product->material_id);
            if($request->stock_ < 0){
                $material_update_stock->increment('stock', abs($request->stock_));
            }
            else{
                $material_update_stock->decrement('stock', $request->stock_);
            }

            return redirect()->back()->withFlashSuccess('Cantidad actualizada con éxito');
        } else {
            return redirect()->back()->withFlashDanger('Error');
        }
    }

    public function comment(Request $request)
    {
        $sale = Sale::findOrFail($request->id);
        $sale->comment = $request->comment;
        $sale->update();

        return redirect()->back()->withFlashSuccess('Comentario actualizado');
    }


    public function dateadd(Request $request)
    {
        $sale = Sale::findOrFail($request->id);
        $sale->date_entered = $request->date_entered;
        $sale->update();

        return redirect()->back()->withFlashSuccess('Fecha actualizada');
    }


    public function addmaterialselect(Request $request, $id)
    {
        $this->validate($request, [
            'product' => 'required',
            'quantity' => 'required|required|not_in:0',
        ]);
        
        $dup = DB::table('material_product_sale')->where('sale_id', $id)->where(['material_id'=>$request->product])->count();
        
        if($dup>=1){
            return redirect()->back()->withFlashDanger('Material ya existente en la orden, modifique cantidad en el listado');
        }

        $cart = new MaterialProductSale();
        $cart->sale_id = $id;
        $cart->material_id = $request->product;
        $cart->product_id = NULL;
        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->back()->withFlashSuccess('Materia prima agregada con éxito');
    }   


    public function addtostaff($id, $staff)
    {

        $sale = Sale::find($id)->with(['material_product_sale', 'products.product_detail.product_detail', 'products.product_detail.product_detail_color', 'products.product_detail.product_detail_size'])->findOrFail($id);

        $staff_by_product = Sale::with(['product_sale_staff.product_stock', 'product_sale_staff.product_stock.product_detail_color', 'product_sale_staff.product_stock.product_detail_size', 'product_sale_staff.staff', 
            'product_sale_staff' => function ($query) use ($staff) {
                $query->where('status_id', $staff)->where('quantity', '<>', 0);
            }
        ])->find($id);

        $status_url = Status::where('id', $staff)->first();
        $statuses = Status::all();

        return view('backend.order.staff', compact('sale', 'status_url', 'statuses', 'staff_by_product'));

    }

    public function storeStaff(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'quantity' => 'required',
        ]); 

        $lastValue = DB::table('material_product_sale_user')->orderBy('folio', 'desc')->first();

        if(!isset($lastValue)){
            $value = 1;
        }
        if(isset($lastValue)){
            $value = $lastValue->folio + 1;
        }

        $quantity = $request->quantity;
        $material_id = $request->material;

        $products = Sale::with('products')->where('id', $request->id)->first();

        if($request->all_quantities){
            foreach($products->products as $product){
                $material_staff = new MaterialProductSaleUser();
                $material_staff->sale_id = $request->id;
                $material_staff->material_id = $product->product_id;
                $material_staff->quantity = $product->quantity;
                $material_staff->user_id = $request->user;
                $material_staff->status_id = $request->status;
                $material_staff->folio = $value;
                $material_staff->audi_id = Auth::id();
                $material_staff->saveOrFail();
            }
        }
        else{
            foreach($quantity as $key => $quant) {
                if(!empty($quant)){
                    $material_staff = new MaterialProductSaleUser();
                    $material_staff->sale_id = $request->id;
                    $material_staff->material_id = $material_id[$key];
                    $material_staff->quantity = $quant ? $quant : 0;
                    $material_staff->user_id = $request->user;
                    $material_staff->status_id = $request->status;
                    $material_staff->folio = $value;
                    $material_staff->audi_id = Auth::id();
                    $material_staff->saveOrFail();
                }
            }
        }

        return redirect()->back()->withFlashSuccess('Personal agregado con éxito');

    }


    public function readyproduct(Request $request)
    {
        $material_byuser = MaterialProductSaleUser::findOrFail($request->id);
        $material_byuser->update($request->all());

        return redirect()->back()
          ->withFlashSuccess('Consumo actualizado con éxito');
    }


    public function changeStatus(Request $request)
    {
        $order = Sale::find($request->id);
        $order->status()->attach($request->status, ['audi_id' => Auth::id()]);

        return redirect()->back()->withFlashSuccess('Estatus cambiado');

    }

    public function toProduction($id)
    {
        $order = Sale::find($id);
        $order->status()->attach(3, ['audi_id' => Auth::id()]);

        return redirect()->back()->withFlashSuccess('Orden a produccion');

    }


    public function toFinal($id)
    {
        $order = Sale::find($id);
        $order->status()->attach(2, ['audi_id' => Auth::id()]);

        return redirect()->back()->withFlashSuccess('Orden finalizada');

    }
    public function mostrar($id)
    {
        $sale = Sale::findOrFail($id);
        return view('backend.order.mostrar', compact('sale'));

    }

    public function latestSell(){
        $latest = Sale::latest('created_at')->where('type', 2)->first();
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
        $sale = Sale::findOrFail($id);

        $format["title"] = "A4";
        $pdf = PDF::setOption('page-height', '367.7')->setOption('page-width', '80')->setOption('margin-right', '0.5')->setOption('margin-left', '0.5')->setOption('margin-top', '4')->loadView('sale', compact('data', 'sale'), [], $format);

        return $pdf->stream($sale->id.'-venta.pdf');
    }

    public function search(Request $request){
        $searching = $request->input('search');

        //now get all user and services in one go without looping using eager loading
            //In your foreach() loop, if you have 1000 users you will make 1000 queries
          $sales = Sale::where('id','like','%'.$searching.'%')->orderBy('id')->paginate(15);
            return view('backend.order.index', compact('sales'));
    }


    public function destroy($id)
    {
        $products = ProductSale::where('sale_id', $id)->get();
        try {

            $delete = Sale::findOrFail($id);
            $delete->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }

        return redirect()->route('admin.order.index')->withFlashSuccess('Venta eliminada con éxito');
    }


}
