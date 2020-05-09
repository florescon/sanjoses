<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellController;

Route::group([
	'prefix' => 'inventory',
	'as' => 'inventory.',
	'namespace' => 'Inventory',  
	], function () {
    Route::group(['namespace' => 'Product', 'middleware' => 'permission:productos'], function () {
        Route::get('product', [ProductController::class, 'index'])->name('product.index');
        Route::post('product', [ProductController::class, 'store'])->name('product.store');
        Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::patch('product', [ProductController::class, 'update'])->name('product.update');

        Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');

        Route::post('product/addstock/{id}', [ProductController::class, 'addstock'])->name('product.addstock');
        Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
    Route::get('select2-load-product', [ProductController::class, 'select2LoadMore'])->name('product.select');


    Route::group(['namespace' => 'Service', 'middleware' => 'permission:servicios'], function () {
        Route::get('service', [ProductController::class, 'indexs'])->name('service.index');
        Route::post('service', [ProductController::class, 'stores'])->name('service.store');
        Route::patch('service', [ProductController::class, 'updates'])->name('service.update');
        Route::get('service/delete/{id}', [ProductController::class, 'destroys'])->name('service.destroy');
    });


	Route::group(['namespace' => 'Sell'], function () {
        Route::get('sell', [SellController::class, 'index'])->name('sell.index');
        Route::get('sell/create', [SellController::class, 'create'])->name('sell.create');
        Route::post('sellcart', [SellController::class, 'storeCart'])->name('sell.storecart');
        Route::delete('sell/{id}', [SellController::class, 'destroy'])->name('sell.destroy');

        Route::post('sell', [SellController::class, 'store'])->name('sell.store');
        Route::get('sell/{id}', [SellController::class, 'show'])->name('sell.show');
        Route::delete('cart/{id}', [SellController::class, 'destroyCart'])->name('cart.destroy');

        Route::get('latest', [SellController::class, 'latestSell'])->name('sell.latest');
        Route::get('sell/{id}/generate-pdf', [SellController::class, 'generatePDF'])->name('sell.generate');
        Route::get('sell/{id}/generate-pdf-material', [SellController::class, 'generatePDFmaterial'])->name('sell.generatematerial');
        Route::get('sell/{id}/{staff}/{folio}/{status}/generate-pdf-product-by-staff', [SellController::class, 'generatePDFproductbystaff'])->name('sell.generateproductbystaff');

        Route::get('search', [SellController::class, 'search'])->name('sell.search');

    });

});

