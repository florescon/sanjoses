<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ColorSizeProduct;
use App\ProductStockHistory;
use DataTables;
use App\DataTables\ProductStockDataTable;
use App\DataTables\ProductStockHistoryDataTable;

class ColorSizeProductController extends Controller
{

    public function index(ProductStockDataTable $dataTable)
    {
        return $dataTable->render('backend.product.product.list');
    }

    public function history(ProductStockHistoryDataTable $dataTable)
    {
        return $dataTable->render('backend.product.product.history');
    }


    public function addstock(Request $request)
    {
        $this->validate($request, [
            'stock_' => 'required',
        ]);
        $product = ColorSizeProduct::findOrFail($request->material);
        $actualstock = $product->stock;
        $product->stock = $actualstock  + $request->stock_;
        if ($product->update()) {
            $log = new ProductStockHistory();
            $log->product_stock_id = $product->id;
            $log->old_quantity = $actualstock;
            $log->quantity = $request->stock_;
            $log->type = 1;
            $log->audi_id = Auth::id();
            $log->saveOrFail();
            return redirect()->back()->withFlashSuccess('Cantidad actualizada con exito');
        } else {
            return redirect()->back()->withFlashDanger('Error');
        }
    }

    public function select2LoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = ColorSizeProduct::with('product_detail', 'product_detail_color', 'product_detail_size')
		->whereHas('product_detail', function($query) use($search){
	       $query->where('name', 'LIKE', '%'. $search .'%');
         })
		->orWhere('price', 'like', '%' . $search . '%')
        ->orWhere('code', 'like', '%' . $search . '%')
        ->paginate(5);
        return response()->json(['products' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

}
