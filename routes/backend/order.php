<?php
use App\Http\Controllers\OrderController;

Route::group(['namespace' => 'Order'], function () {

    Route::get('order', [OrderController::class, 'index'])->name('order.index');

    Route::get('orderprocess', [OrderController::class, 'process'])->name('order.process-');

    Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('ordercart', [OrderController::class, 'storeCart'])->name('order.storecart');

    Route::post('ordercartupdatequantities', [OrderController::class, 'updateQuantitiesCart'])->name('order.updatequantities');

    Route::get('order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

    Route::put('order/autosavequantity/{id}', [OrderController::class, 'autoSaveQuantityCart'])->name('order.autosave');

    Route::post('order', [OrderController::class, 'store'])->name('order.store');
    Route::get('order/{id}/show', [OrderController::class, 'show'])->name('order.show');


    Route::get('order/{id}/reintegrate', [OrderController::class, 'reintegrate'])->name('order.reintegrate');
    Route::get('order/reintegrateproduct/{product}', [OrderController::class, 'reintegrateproduct'])->name('order.reintegrateproduct');

    Route::get('order/reintegrateallproducts/{product}', [OrderController::class, 'reintegrateallproducts'])->name('order.reintegrateallproducts');

    Route::delete('destroycart/{id}', [OrderController::class, 'destroyCart'])->name('ordercart.destroy');
    Route::delete('destroycartAll', [OrderController::class, 'destroyAllCart'])->name('ordercartall.destroy');


    Route::post('order/addmaterial/{id}', [OrderController::class, 'addmaterial'])->name('order.addmaterial');
    Route::post('order/addmaterialselect/{id}', [OrderController::class, 'addmaterialselect'])->name('order.addmaterialselect');

    Route::get('order/{id}/addtostaff/{staff}', [OrderController::class, 'addtostaff'])->name('order.addtostaff');

    Route::get('order/{id}/addtorevisionstock/{staff}', [OrderController::class, 'addtorevisionstock'])->name('order.addtorevisionstock');

    Route::post('orderstaff', [OrderController::class, 'storeStaff'])->name('order.orderstaff');
    Route::post('orderstockrevision', [OrderController::class, 'storeStockRevision'])->name('order.orderstockrevision');
    Route::post('orderstaffmaterial', [OrderController::class, 'storeStaffMaterial'])->name('order.orderstaffmaterial');

    Route::patch('order/readyproduct/{id}', [OrderController::class, 'readyproduct'])->name('order.readyproduct');
    Route::get('order/readyallproducts/{id}', [OrderController::class, 'readyallproducts'])->name('order.readyallproducts');
    

    Route::patch('order/readyproductrevisionstock/{id}', [OrderController::class, 'readyproductrevisionstock'])->name('order.readyproductrevisionstock');
    Route::get('order/readyallproductsrevisionstock/{id}', [OrderController::class, 'readyallproductsrevisionstock'])->name('order.readyallproductsrevisionstock');

    
    Route::post('ordercomment/{id}', [OrderController::class, 'comment'])->name('order.comment');
    Route::post('orderdate/{id}', [OrderController::class, 'dateadd'])->name('order.dateadd');
    

    Route::post('change', [OrderController::class, 'changeStatus'])->name('order.change');
    Route::get('orderproduction/{id}', [OrderController::class, 'toProduction'])->name('order.production');
    Route::get('orderfinal/{id}', [OrderController::class, 'toFinal'])->name('order.final');
    
    Route::get('latest', [OrderController::class, 'latestSell'])->name('order.latest');
    Route::get('order/{id}/generate-pdf', [OrderController::class, 'generatePDF'])->name('order.generate');

    Route::get('search', [OrderController::class, 'search'])->name('order.search');

});
