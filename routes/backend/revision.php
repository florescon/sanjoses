<?php
use App\Http\Controllers\StockRevisionController;

Route::group(['namespace' => 'Revision'], function () {

    Route::get('revision', [StockRevisionController::class, 'index'])->name('revision.index');

});
