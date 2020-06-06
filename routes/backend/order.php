<?php
use App\Http\Controllers\OrderController;

Route::group(['namespace' => 'Order'], function () {

    Route::get('order', [OrderController::class, 'index'])->name('order.index');

    Route::get('orderprocess', [OrderController::class, 'process'])->name('order.process-');

    Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('ordercart', [OrderController::class, 'storeCart'])->name('order.storecart');
    Route::get('order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');



    Route::post('order', [OrderController::class, 'store'])->name('order.store');
    Route::get('order/{id}/show', [OrderController::class, 'show'])->name('order.show');


    Route::delete('destroyorder/{id}', [OrderController::class, 'destroyCart'])->name('ordercart.destroy');


    Route::post('order/addmaterial/{id}', [OrderController::class, 'addmaterial'])->name('order.addmaterial');
    Route::post('order/addmaterialselect/{id}', [OrderController::class, 'addmaterialselect'])->name('order.addmaterialselect');

    Route::get('order/{id}/addtostaff/{staff}', [OrderController::class, 'addtostaff'])->name('order.addtostaff');
    Route::post('orderstaff', [OrderController::class, 'storeStaff'])->name('order.orderstaff');

    Route::patch('order/readyproduct', [OrderController::class, 'readyproduct'])->name('order.readyproduct');


    Route::post('change', [OrderController::class, 'changeStatus'])->name('order.change');
    Route::get('orderproduction/{id}', [OrderController::class, 'toProduction'])->name('order.production');
    Route::get('orderfinal/{id}', [OrderController::class, 'toFinal'])->name('order.final');
    
    Route::get('latest', [OrderController::class, 'latestSell'])->name('order.latest');
    Route::get('order/{id}/generate-pdf', [OrderController::class, 'generatePDF'])->name('order.generate');

    Route::get('search', [OrderController::class, 'search'])->name('order.search');

});
