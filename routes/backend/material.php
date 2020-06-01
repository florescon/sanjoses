<?php
use App\Http\Controllers\MaterialController;

Route::group(['namespace' => 'Material'], function () {

    Route::get('material', [MaterialController::class, 'index'])->name('material.index');
    Route::post('material', [MaterialController::class, 'store'])->name('material.store');
	
	Route::get('material/{id}/edit', [MaterialController::class, 'edit'])->name('material.edit');

    Route::patch('material', [MaterialController::class, 'update'])->name('material.update');
    Route::get('material/{id}', [MaterialController::class, 'destroy'])->name('material.destroy');

    Route::get('materialhistory', [MaterialController::class, 'history'])->name('materialhistory.index');
    Route::get('materialhistory/{id}/show', [MaterialController::class, 'historyshow'])->name('materialhistory.show');

    Route::get('materialhistoryout', [MaterialController::class, 'historyout'])->name('materialhistoryout.index');

    Route::post('material/addstock/{id}', [MaterialController::class, 'addstock'])->name('material.addstock');
    Route::post('material/substractstock/{id}', [MaterialController::class, 'substractstock'])->name('material.substractstock');

});
