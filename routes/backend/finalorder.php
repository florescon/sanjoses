<?php
use App\Http\Controllers\FinalOrderController;

Route::group([
    'prefix' => 'finalorder',
    'as' => 'finalorder.',
	'namespace' => 'Finalorder'], function () {

	    Route::get('finalorder', [FinalOrderController::class, 'index'])->name('index');
	    Route::get('create', [FinalOrderController::class, 'create'])->name('create');

	    Route::post('finalorderstore', [FinalOrderController::class, 'store'])->name('store');

	    Route::post('finalordercart', [FinalOrderController::class, 'storeCart'])->name('storecart');
	    Route::post('finalordercartupdatequantities', [FinalOrderController::class, 'updateQuantitiesCart'])->name('updatequantities');

	    Route::get('finalorder/{id}/generate-pdf', [FinalOrderController::class, 'generatePDF'])->name('generate');

	    Route::delete('destroyfinalordercart/{id}', [FinalOrderController::class, 'destroyCart'])->name('destroy');
	    Route::delete('destroyfinalordercartAll', [FinalOrderController::class, 'destroyAllCart'])->name('destroyallcart');

	    Route::get('finalorder/{id}', [FinalOrderController::class, 'destroy'])->name('destroy');


});

