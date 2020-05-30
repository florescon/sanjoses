<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\ProductDetail;
use App\Stock;
use App\ColorSizeProduct;
use App\ProductStockHistory;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceUpdateRequest;
use PDF;
use DataTables;
use Carbon;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        // $products = Product::orderBy('updated_at', 'desc')->where('type', 1)->paginate();
        // return view('backend.product.product.index', compact('products'));

        if ($request->ajax()) {
            // select('id', 'name', 'address', 'created_at', 'updated_at')
            $data = Product::query()->where('type', 1);
            return Datatables::of($data)
                    ->addIndexColumn()
                    // ->editColumn('created_at', function ($dat) {
                    //     return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
                    // })
                    ->editColumn('quantity', function ($dat) {
                        return $dat->getTotalStock();
                    })
                    ->addColumn('action', function($row){
                           $btn = '
                           <div class="btn-group" role="group" aria-label="'. __('labels.backend.access.users.user_actions') .'">

                           <a href="" data-toggle="modal" data-target="#duplicate" data-id="'.$row->id.'" title="'. __('buttons.general.crud.clone') .'" class="btn btn-xs btn-outline-dark"><i class="fas fa-clone"></i></a>

                            <a href="'. route('admin.product.product.show', $row->id) .'" data-toggle="tooltip" data-placement="top" title="'. __('buttons.general.crud.view') .'" class="btn btn-info"><i class="fas fa-eye"></i></a>


                            ';
                            if($row->color_size_product->count() == 0){
                            $btn = $btn.'
                                <a href="'. route('admin.product.product.edit', $row->id).'" data-toggle="tooltip" data-placement="top" title="'. __('buttons.general.crud.edit') .'" class="btn btn-danger">  '.__('labels.backend.access.product.table.incomplete').' </a>
                            ';
                            }
                            $btn = $btn.'
                                <a href="'.route('admin.product.product.destroy', $row->id).'" class="btn btn-delete btn-outline-danger" title="'.$row->name.'" data-trans-button-confirm="'. __('buttons.general.crud.delete').'"  data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-text="'.__('strings.backend.general.revert_this').'" data-trans-title="'.__('strings.backend.general.are_you_sure_delete').'" data-trans-success="'.__('strings.backend.general.success').'" data-trans-deleted="'.__('strings.backend.general.deleted').'" data-trans-wrong="'.__('strings.backend.general.wrong').'"><i class="fas fa-trash"></i>
                                </a>
                            </div>    
                            ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('backend.product.product.index');

    }


    public function consumption(Request $request)
    {
        // $products = Product::orderBy('updated_at', 'desc')->where('type', 1)->paginate();
        // return view('backend.product.product.index', compact('products'));

        if ($request->ajax()) {
            // select('id', 'name', 'address', 'created_at', 'updated_at')
            $data = Product::query()->where('type', 1);
            return Datatables::of($data)
                    ->addIndexColumn()
                    // ->editColumn('created_at', function ($dat) {
                    //     return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
                    // })
                    ->editColumn('quantity', function ($dat) {
                        return $dat->getTotalStock();
                    })
                    ->addColumn('action', function($row){
                            $btn = '
                                <a href="'. route('admin.product.bom.create', $row->id).'" data-toggle="tooltip" data-placement="top" title="'. __('labels.backend.access.product.table.bom') .'" class="btn btn-warning"> <i class="fas fa-bomb"></i>  '.__('labels.backend.access.product.table.view').' </a>
                            ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('backend.product.product.consumption');

    }


    public function store(ProductRequest $request)
    {

        $product = new Product;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->type = 1;
        $product->save();
        
        if ($request->has('colors')) {
            $product->colors()->sync($request['colors']);
        }

        if ($request->has('sizes')) {
            $product->sizes()->sync($request['sizes']);
        }

        return redirect()->route('admin.product.product.edit', compact('product'))
          ->withFlashWarning('Termine de guardar las combinaciones del producto');

    }

    public function show($id)
    {
        $product = Product::with('colors', 'detail', 'color_size_product', 'color_size_product.product_detail', 'color_size_product.product_detail_color', 'color_size_product.product_detail_size')->findOrFail($id);
        return view('backend.product.product.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::with('colors')->with('sizes')->findOrFail($id);
        
        // foreach($product->colors as $value){
        //     $loop[] = $value->id;
        // }

        // foreach($product->sizes as $value){
        //     $loopsizes[] = $value->id;
        // }

        // $combinations = collect($loop)->crossJoin(
        //     collect($loopsizes)->all()
        // )->toArray();  

        // dd(array_column($combinations, 0));


        // $product->colores()->attach(array_column($combinations, 0), ['size_id' => '2']);

        // $combinations = collect($loop)->crossJoin(
        //     $collections = $collection->each(function ($item, $key){
        //         return $item;
        //     })->toArray()
        // );

        // dd($combinations[0]);

        return view('backend.product.product.edit', compact('product'));
    }

    public function updateInitialStock(Request $request)
    {

        $product = Product::findOrFail($request->id);

            $colors = $request->color_id;
            $sizes = $request->size_id;
            $stock = $request->stock_for;
            $price = $request->price_for;

            $rows = [];
                foreach($stock as $key => $input ){
                    array_push($rows, [
                        'product_id' => $request->id,
                        'color_id' => isset($colors[$key]) ? $colors[$key] : '',
                        'size_id' => isset($sizes[$key]) ? $sizes[$key] : '',
                        'stock' => isset($stock[$key]) ? $stock[$key] : '0',
                        'price' => isset($price[$key]) ? $price[$key] : '0',
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime(),
                    ]);
                }
                // dd($rows);
                ColorSizeProduct::insert($rows);

        return redirect()->route('admin.product.product.index')
          ->withFlashSuccess('Producto actualizado con éxito');
    }


    public function update(ProductUpdateRequest $request)
    {

        $product = Product::findOrFail($request->id);
        $product->update($request->all());

        if ($request->has('colors_edit')) {
            $product->colors()->sync($request['colors_edit']);
        }
        if ($request->has('sizes_edit')) {
            $product->sizes()->sync($request['sizes_edit']);
        }

        // foreach($product->colors as $value){
        //     $loop[] = $value->id;
        // }
        // foreach($product->sizes as $value){
        //     $loopsizes[] = $value->id;
        // }

        // $product->colores()->detach([1]);



        // Stock::where('product_id', $request->id)
        //         ->update(['price' => $request->price_for]);


        // $summaryItem = Stock::find($request->id);
        // $summaryItem->fill([
        //     'price' => $request->price_for,
        // ]);

            // $colors = $request->color_id;
            // $sizes = $request->size_id;
            // $stock = $request->stock_for;
            // $price = $request->price_for;

            // $rows = [];
            // if($request->has('stock_for')){
            //     foreach($stock as $key => $input ){
            //         array_push($rows, [
            //             'product_id' => $request->id,
            //             'color_id' => isset($colors[$key]) ? $colors[$key] : '',
            //             'size_id' => isset($sizes[$key]) ? $sizes[$key] : '',
            //             'stock' => isset($stock[$key]) ? $stock[$key] : '0',
            //             'price' => isset($price[$key]) ? $price[$key] : '0',
            //             'created_at' => new \DateTime(),
            //             'updated_at' => new \DateTime(),
            //         ]);
            //     }
            //     // dd($rows);
            //     ColorSizeProduct::insert($rows);
            // }

        return redirect()->back()
          ->withFlashSuccess('Producto actualizado con éxito');
    }


    public function updateprice(Request $request, ColorSizeProduct $productstock)
    {
        $productstock = ColorSizeProduct::findOrFail($request->id);
        $productstock->update($request->all());

        return redirect()->back()
          ->withFlashSuccess('Color actualizado con éxito');
    }


    public function addstockindividual(Request $request)
    {
        $this->validate($request, [
            'stock_' => 'required',
        ]);
        $product = ColorSizeProduct::findOrFail($request->id);
        $actualquantity = $product->stock;
        $product->stock = $actualquantity  + $request->stock_;
        if ($product->update()) {
            $log = new ProductStockHistory();
            $log->product_stock_id = $product->id;
            $log->old_quantity = $actualquantity;
            $log->quantity = $request->stock_;
            $log->type = 1;
            $log->audi_id = Auth::id();
            $log->saveOrFail();
            return redirect()->back()->withFlashSuccess('Cantidad actualizada con exito');
        } else {
            return redirect()->back()->withFlashDanger('Error');
        }
    }



    public function addcolor(Request $request)
    {
        $this->validate($request, [
            'color' => 'required',
        ]);

        $product = Product::findOrFail($request->id);

        // dd($request['color']);

        if ($request->has('color')) {

            if(!$product->colors->contains($request['color'])){

                $product->colors()->syncWithoutDetaching($request['color']);
                foreach($product->sizes as $size){
                    $sizee[] = $size->id;
                }

                $rows = [];
                foreach($sizee as $key => $input ){
                    array_push($rows, [
                        'product_id' => $request->id,
                        'color_id' => $request->color ? $request->color : '',
                        'size_id' => isset($sizee[$key]) ? $sizee[$key] : '',
                        'stock' =>  '0',
                        'price' =>  isset($product->price) ? $product->price : '',
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime(),
                    ]);
                }

                ColorSizeProduct::insert($rows);                    
            }
        }

        return redirect()->back()->withFlashSuccess('Color agredo con exito');

    }

    public function addsize(Request $request)
    {
        $this->validate($request, [
            'size' => 'required',
        ]);

        $product = Product::findOrFail($request->id);

        if ($request->has('size')) {

            if(!$product->sizes->contains($request['size'])){

                $product->sizes()->syncWithoutDetaching($request['size']);
                foreach($product->colors as $size){
                    $colors[] = $size->id;
                }

                $rows = [];
                foreach($colors as $key => $input ){
                    array_push($rows, [
                        'product_id' => $request->id,
                        'color_id' => isset($colors[$key]) ? $colors[$key] : '',
                        'size_id' => $request->size ? $request->size : '',
                        'stock' =>  '0',
                        'price' =>  isset($product->price) ? $product->price : '',
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime(),
                    ]);
                }

                ColorSizeProduct::insert($rows);                    
            }
        }

        return redirect()->back()->withFlashSuccess('Color agredo con exito');

    }


    public function clone(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:products,code',
        ]);

        $product = Product::with('colors', 'sizes')->findOrFail($request->id);
        $clone = $product->replicate();
        $clone->code = $request->code;
        $clone->save();

        foreach($product->colors as $relation => $values){
            $clone->colors()->syncWithoutDetaching($values);
        }

        foreach($product->sizes as $relation => $values){
            $clone->sizes()->syncWithoutDetaching($values);
        }

        return redirect()->route('admin.product.product.edit', compact('clone'))
          ->withFlashWarning('Termine de guardar las combinaciones del producto');

    }

    public function addstock(Request $request)
    {
        $this->validate($request, [
            'quantity_' => 'required',
        ]);
        $product = Product::findOrFail($request->id);
        $actualquantity = $product->quantity;
        $product->quantity = $actualquantity  + $request->quantity_;
        if ($product->update()) {
            $log = new ProductDetail();
            $log->product_id = $product->id;
            $log->old_quantity = $actualquantity;
            $log->quantity = $request->quantity_;
            $log->audi_id = Auth::id();
            $log->save();
            return redirect()->route('admin.product.product.index')->withFlashSuccess('Cantidad actualizada con exito');
        } else {
            return redirect()->route('admin.product.product.index')->withFlashDanger('Error');
        }
    }


    // public function generatePDF()
    // {
    //     $data = ['title' => 'Welcome to '];
    //     // $pdf = PDF::loadView('mypdf', $data);

    //     $customPaper = array(0,0,667.00,283.80);
    //     $pdf = PDF::loadView('mypdfthermal', compact('data'));

    //     return $pdf->stream('itsolutionstuff.pdf');
    // }

    public function destroy($id)
    {

        try {
            $product = Product::findOrFail($id);
            $product->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.product.product.index')->withFlashSuccess('Producto eliminado con éxito');
    }

    public function select2LoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = Product::select(['id', 'name', 'code', 'quantity', 'price'])->where('name', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%')->orderBy('name')->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }


    public function indexs(Request $request)
    {
        // $services = Product::orderBy('updated_at', 'desc')->where('type', 2)->paginate();
        // return view('backend.inventory.service.index', compact('services'));

        if ($request->ajax()) {
            $data = Product::query()->where('type', 2);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($dat) {
                        return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
                    })
                    ->editColumn('updated_at', function ($dat) {
                        return $dat->updated_at ? with(new Carbon($dat->updated_at))->format('d-m-Y H:i:s') : '';
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="#" data-toggle="modal" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary" data-id="'.$row->id.'" data-myname="'.$row->name.'" data-myprice="'. $row->price .'" data-target="#editService"><i class="fas fa-edit"></i></a>';
                           $btn = $btn. '
                            <a href="'.route('admin.inventory.service.destroy', $row->id).'" class="btn btn-delete btn-outline-danger" title="'.$row->name.'" data-trans-button-confirm="'. __('buttons.general.crud.delete').'"  data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-text="'.__('strings.backend.general.revert_this').'" data-trans-title="'.__('strings.backend.general.are_you_sure_delete').'" data-trans-success="'.__('strings.backend.general.success').'" data-trans-deleted="'.__('strings.backend.general.deleted').'" data-trans-wrong="'.__('strings.backend.general.wrong').'"><i class="fas fa-trash"></i>
                            </a>

                           ';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('backend.inventory.service.index');

    }

    public function stores(ServiceRequest $request)
    {

        $service = new Product;
        $service->name = $request->name;
        $service->price = $request->price;
        $service->type = 2;
        $service->save();        
        // $product = Product::create($input);
    
        return redirect()->route('admin.inventory.service.index')
          ->withFlashSuccess('Servicio guardado con éxito');

    }

    public function updates(ServiceUpdateRequest $request)
    {

        $service = Product::findOrFail($request->id);
        $service->update($request->all());

        return redirect()->route('admin.inventory.service.index')
          ->withFlashSuccess('Servicio actualizado con éxito');
    }


    public function destroys($id)
    {

        try {
            $service = Product::findOrFail($id);
            $service->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger(__('exceptions.backend.access.general.cant_delete'));
        }


        return redirect()->route('admin.inventory.service.index')->withFlashSuccess('Servicio eliminado con éxito');
    }

}
