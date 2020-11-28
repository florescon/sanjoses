<?php

namespace App\Http\Controllers;

use App\StockRevision;
use App\StockRevisionLog;
use Illuminate\Http\Request;
use App\DataTables\StockRevisionDataTable;

class StockRevisionController extends Controller
{

    public function index(StockRevisionDataTable $dataTable)
    {
        return $dataTable->render('backend.revision.index');
    }


    public function addstockrevision(Request $request)
    {

        $this->validate($request, [
            'stock_' => 'required|integer|not_in:0',
        ]);

        $product_id = StockRevision::where('product_id', $request->material)->first();
        if(!$product_id){
            $revision_stock = StockRevision::firstOrCreate([
                'product_id' => $request->material,
                'quantity' => $request->stock_,
            ]);
            $revision_stock->save();
        }
        else{
            $product_id->increment('quantity', $request->stock_);
        }

        $log = new StockRevisionLog();
        $log->product_id = $request->material;
        $log->quantity = $request->stock_;
        $log->type = ($request->stock_ > 0) ? 1 : 2;
        // $log->audi_id = Auth::id();
        $log->saveOrFail();

            return redirect()->back()->withFlashSuccess('Cantidad actualizada con exito');
    }


}
