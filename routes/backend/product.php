<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SleeveController;
use App\Http\Controllers\ClothController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ColorSizeProductController;
use App\Http\Controllers\BomController;
use App\Http\Controllers\MaterialController;

Route::group([
    'prefix' => 'product',
    'as' => 'product.',
    'namespace' => 'Product',
], function () {

    Route::group(['namespace' => 'Product', 'middleware' => 'permission:productos'], function () {
        Route::get('product', [ProductController::class, 'index'])->name('product.index');
        Route::post('product', [ProductController::class, 'store'])->name('product.store');
        Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');

        Route::patch('product', [ProductController::class, 'update'])->name('product.update');

        Route::patch('productinitialstock', [ProductController::class, 'updateInitialStock'])->name('product.updateinitialstock');

        Route::get('producthistory', [ColorSizeProductController::class, 'history'])->name('producthistory.index');

        Route::get('productlist', [ColorSizeProductController::class, 'index'])->name('productlist.index');

        Route::post('producthistory/addstock/{id}', [ColorSizeProductController::class, 'addstock'])->name('producthistory.addstock');

        Route::post('productcolor/addcolor/{id}', [ProductController::class, 'addcolor'])->name('product.addcolor');
        Route::post('productsize/addsize/{id}', [ProductController::class, 'addsize'])->name('product.addsize');

        Route::post('productclone/{id}', [ProductController::class, 'clone'])->name('product.clone');

        Route::patch('productprice', [ProductController::class, 'updateprice'])->name('product.updateprice');

        Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');

        Route::post('product/addstock/{id}', [ProductController::class, 'addstock'])->name('product.addstock');
        Route::post('product/addstockindividual/{id}', [ProductController::class, 'addstockindividual'])->name('product.addstockindividual');

        Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
    Route::get('select2-load-product', [ProductController::class, 'select2LoadMore'])->name('product.select');
    Route::get('select2-load-product-details', [ColorSizeProductController::class, 'select2LoadMore'])->name('productdetails.select');
    Route::get('select2-load-material-details', [MaterialController::class, 'select2LoadMore'])->name('materialdetails.select');

    Route::group(['namespace' => 'Color', 'middleware' => 'permission:colores'], function () {
		Route::get('color', [ColorController::class, 'index'])->name('color.index');
	    Route::post('color', [ColorController::class, 'store'])->name('color.store');
	    Route::patch('color', [ColorController::class, 'update'])->name('color.update');
	    Route::get('color/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
	});
    Route::get('select2-load-color', [ColorController::class, 'select2LoadMore'])->name('color.select');

    Route::group(['namespace' => 'Sleeve', 'middleware' => 'permission:mangas'], function () {
		Route::get('sleeve', [SleeveController::class, 'index'])->name('sleeve.index');
	    Route::post('sleeve', [SleeveController::class, 'store'])->name('sleeve.store');
	    Route::patch('sleeve', [SleeveController::class, 'update'])->name('sleeve.update');
	    Route::delete('sleeve/{id}', [SleeveController::class, 'destroy'])->name('sleeve.destroy');
	});
    Route::get('select2-load-sleeve', [SleeveController::class, 'select2LoadMore'])->name('sleeve.select');

    Route::group(['namespace' => 'Cloth', 'middleware' => 'permission:telas'], function () {
		Route::get('cloth', [ClothController::class, 'index'])->name('cloth.index');
	    Route::post('cloth', [ClothController::class, 'store'])->name('cloth.store');
	    Route::patch('cloth', [ClothController::class, 'update'])->name('cloth.update');
	    Route::delete('cloth/{id}', [ClothController::class, 'destroy'])->name('cloth.destroy');
	});
    Route::get('select2-load-cloth', [ClothController::class, 'select2LoadMore'])->name('cloth.select');

    Route::group(['namespace' => 'Line', 'middleware' => 'permission:lineas'], function () {
		Route::get('line', [LineController::class, 'index'])->name('line.index');
	    Route::post('line', [LineController::class, 'store'])->name('line.store');
	    Route::patch('line', [LineController::class, 'update'])->name('line.update');
	    Route::delete('line/{id}', [LineController::class, 'destroy'])->name('line.destroy');
	});
    Route::get('select2-load-line', [LineController::class, 'select2LoadMore'])->name('line.select');

    Route::group(['namespace' => 'Size', 'middleware' => 'permission:tallas'], function () {
		Route::get('size', [SizeController::class, 'index'])->name('size.index');
	    Route::post('size', [SizeController::class, 'store'])->name('size.store');
	    Route::patch('size', [SizeController::class, 'update'])->name('size.update');
	    Route::delete('size/{id}', [SizeController::class, 'destroy'])->name('size.destroy');
	});
    Route::get('select2-load-size', [SizeController::class, 'select2LoadMore'])->name('size.select');

    Route::group(['namespace' => 'Unit', 'middleware' => 'permission:unidades de medida'], function () {
		Route::get('unit', [UnitController::class, 'index'])->name('unit.index');
	    Route::post('unit', [UnitController::class, 'store'])->name('unit.store');
	    Route::patch('unit', [UnitController::class, 'update'])->name('unit.update');
	    Route::delete('unit/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');
	});
    Route::get('select2-load-unit', [UnitController::class, 'select2LoadMore'])->name('unit.select');


	Route::group(['namespace' => 'Bom', 'middleware' => 'permission:explosion de materiales'], function () {
        Route::get('bom/{id}/create', [BomController::class, 'create'])->name('bom.create');
        Route::post('bomcart/{id}/save', [BomController::class, 'storeCart'])->name('bom.storecart');
        Route::delete('cartbom/{id}', [BomController::class, 'destroyCart'])->name('cartbom.destroy');

    });


});
