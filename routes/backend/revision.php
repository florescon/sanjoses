<?php
use App\Http\Controllers\StockRevisionController;

Route::group(['namespace' => 'Revision'], function () {

    Route::get('revision', [StockRevisionController::class, 'index'])->name('revision.index');
    // Route::post('revision/addstock/{id}', [StockRevisionController::class, 'addstock'])->name('revision.addstock');

});
