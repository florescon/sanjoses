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
        })->paginate();


        return view('backend.order.process', compact('list', 'orders'));

    }


    public function create()
    {
        $products = Cart::with('product')->where('audi_id', Auth::id())->get();
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
        
        $dup = DB::table('carts')->where(['product_id'=>$request->product])->where('audi_id', Auth::id())->count();
        
        if($dup>=1){
            return redirect()->back()->withFlashDanger('Producto duplicado');
        }

        $cart = new Cart();
        $cart->product_id = $request->product;
        $cart->quantity = $request->quantity;
        $cart->audi_id = Auth::id();
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

    public function store(Request $request)
    {

        $products = Cart::with('boms')->where('audi_id', Auth::id())->get();
        try {
            $sell = new Sale();
            $sell->user_id = $request->user;
            $sell->ticket_text = $request->ticket_text;
            $sell->payment_method_id = $request->payment;
            $sell->audi_id = Auth::id();
            $sell->type = 2;
            $sell->save();

            if(isset($request->status)){
                $sell->status()->attach($request->status, ['audi_id' => Auth::id()]);
            }
            else{ 
                $sell->status()->attach(1, ['audi_id' => Auth::id()]);   
            }

            foreach ($products as $product) {

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

                ProductSale::create([
                    'sale_id' => $sell->id,
                    'product_id' => $product->product_id,
                    'quantity' => $product->quantity,
                    'price' => $product->price
                ]);
            }
            // $sell->sale()->attach($products);
            DB::table('carts')->where('audi_id', Auth::id())->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger('Error');

        }
        return redirect()->route('admin.order.create')
          ->withFlashSuccess('Venta realizada con éxito');
    }


    public function show($id)
    {

        // $sale = Sale::with('products', 'products.boms', 'products.boms.material', 'products.product_detail', 'products.product_detail.product_detail_size', 'products.product_detail.product_detail_color')->findOrFail($id);
        $sale = Sale::with('products', 'material_product_sale', 'products.boms')->findOrFail($id);

        $sale_material = Sale::with(['material_product_sale' => function($query){
                    $query->groupBy('material_id')->selectRaw('*, sum(quantity) as sum');
                }]
        )->findOrFail($id);

        $statuses = Status::all();

        return view('backend.order.show', compact('sale', 'statuses', 'sale_material'));
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

            return redirect()->back()->withFlashSuccess('Cantidad actualizada con exito');
        } else {
            return redirect()->back()->withFlashDanger('Error');
        }
    }


    public function addtostaff($id, $staff)
    {

        // $sale = Sale::with('products', 'products.boms', 'products.boms.material', 'products.product_detail', 'products.product_detail.product_detail_size', 'products.product_detail.product_detail_color')->findOrFail($id);

        $sale = Sale::with(['products', 'material_product_sale', 'products.product_detail', 
            'product_sale_staff' => function ($query) use ($staff) {
                $query->where('status_id', $staff)->groupBy('material_id')->selectRaw('*, sum(quantity) as sum');
            },  
            'products.boms'])->findOrFail($id);

        $staff_by_product = Sale::with(['product_sale_staff.product_stock', 'product_sale_staff.staff', 
            'product_sale_staff' => function ($query) use ($staff) {
                $query->where('status_id', $staff)->where('quantity', '<>', 0);
            }
        ])->find($id);

        $assigned_products = Sale::with(['product_sale_staff' => function($query) use ($staff){
                    $query->groupBy('material_id')->selectRaw('*, sum(quantity) as sum');
                }]
        )->find($id);


        $status_url = Status::where('id', $staff)->first();
        $statuses = Status::all();

        return view('backend.order.staff', compact('sale', 'status_url', 'statuses', 'staff_by_product', 'assigned_products'));

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

        return redirect()->back()->withFlashSuccess('Personal agregado con exito');

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
        $latest = Sale::latest('created_at')->first();
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
        $customPaper = array(0,0,667.00,283.80);
        $pdf = PDF::setOption('page-height', '267.7')->setOption('page-width', '55.9')->setOption('margin-right', '3')->setOption('margin-left', '3')->setOption('margin-top', '7')->loadView('sale', compact('data', 'sale'), [], $format);

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

        return redirect()->route('admin.order.index')->withFlashSuccess('Venta eliminada con éxito');
    }


}
