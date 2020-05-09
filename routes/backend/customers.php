<?php

use App\Http\Controllers\Backend\Auth\User\UserController;

Route::group(['namespace' => 'Customer', 'middleware' => 'permission:clientes'], function () {

    Route::get('customer', [UserController::class, 'indexCustomer'])->name('customer.index');
    Route::get('customer/create', [UserController::class, 'createCustomer'])->name('customer.create');
    Route::get('search/customer', [UserController::class, 'searchCustomer'])->name('customer.search');

    Route::post('customer', [UserController::class, 'storeCustomer'])->name('customer.store');

    Route::group(['prefix' => 'customer/{user}'], function () {
        Route::get('/', [UserController::class, 'showCustomer'])->name('customer.show');
	    Route::get('edit', [UserController::class, 'editCustomer'])->name('customer.edit');
        Route::patch('/', [UserController::class, 'updateCustomer'])->name('customer.update');
   });

});
