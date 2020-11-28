<?php
use App\Http\Controllers\StockRevisionController;
use App\Http\Controllers\StockRevisionLogController;

Route::group(['namespace' => 'Revision'], function () {

    Route::get('revision', [StockRevisionController::class, 'index'])->name('revision.index');
    Route::post('revision/addstock/{id}', [StockRevisionController::class, 'addstockrevision'])->name('revision.addstock');


});

Route::group(['namespace' => 'Revisionlog'], function () {

    Route::get('revisionlog', [StockRevisionLogController::class, 'index'])->name('revisionlog.index');

});
