<?php
use App\Http\Controllers\StockRevisionController;
use App\Http\Controllers\StockRevisionLogController;

Route::group([
    'prefix' => 'revision',
    'as' => 'revision.',
	'namespace' => 'Revision'], function () {

    Route::get('revision', [StockRevisionController::class, 'index'])->name('index');
    Route::post('revision/addstock/{id}', [StockRevisionController::class, 'addstockrevision'])->name('addstock');

    Route::get('select2-load-product-revision', [StockRevisionController::class, 'select2LoadMore'])->name('productdetails.select');
    Route::get('select2-load-stock-revision', [StockRevisionController::class, 'select2LoadStockRevision'])->name('productrevision.select');



});

Route::group(['namespace' => 'Revisionlog'], function () {

    Route::get('revisionlog', [StockRevisionLogController::class, 'index'])->name('revisionlog.index');

});
