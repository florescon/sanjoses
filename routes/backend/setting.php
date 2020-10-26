<?php

use App\Http\Controllers\SettingController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\SmallCardController;
use App\Http\Controllers\StatusController;

Route::group([
    'prefix' => 'setting',
    'as' => 'setting.',
    'namespace' => 'Setting',
], function () {

    Route::group(['namespace' => 'General', 'middleware' => 'permission:configuraciones generales'], function () {
		Route::get('general', [SettingController::class, 'index'])->name('general.index');
	    Route::post('general', [SettingController::class, 'store'])->name('general.store');
	    Route::patch('general', [SettingController::class, 'update'])->name('general.update');
	    Route::delete('general/{id}', [SettingController::class, 'destroy'])->name('general.destroy');
	});

	Route::group(['namespace' => 'Method', 
		'middleware' => 'permission:metodos de pago'
		], function () {
		Route::get('method', [PaymentMethodsController::class, 'index'])->name('method.index');
	    Route::post('method', [PaymentMethodsController::class, 'store'])->name('method.store');
	    Route::patch('method', [PaymentMethodsController::class, 'update'])->name('method.update');
        Route::get('method/{id}', [PaymentMethodsController::class, 'show'])->name('method.show')->middleware('role:'.config('access.users.admin_role'));
	    Route::delete('method/{id}', [PaymentMethodsController::class, 'destroy'])->name('method.destroy');

	    Route::post('smallcard', [SmallCardController::class, 'store'])->name('smallcard.store');
	    Route::patch('smallcard', [SmallCardController::class, 'update'])->name('smallcard.update');
        Route::get('smallcard/{id}', [SmallCardController::class, 'show'])->name('smallcard.show');
	    Route::delete('smallcard/{id}', [SmallCardController::class, 'destroy'])->name('smallcard.destroy');

	});

	Route::get('select2-load-method', [PaymentMethodsController::class, 'select2LoadMore'])->name('method.select');

    Route::group(['namespace' => 'Status', 'middleware' => 'permission:configuraciones generales'], function () {
		Route::get('status', [StatusController::class, 'index'])->name('status.index');
		Route::get('status/trash', [StatusController::class, 'trash'])->name('status.trash');
	    Route::post('status', [StatusController::class, 'store'])->name('status.store');
	    Route::patch('status', [StatusController::class, 'update'])->name('status.update');

	    Route::get('statusaddusers/{id}', [StatusController::class, 'addUsers'])->name('status.statusaddusers');

	    Route::delete('status/{id}', [StatusController::class, 'destroy'])->name('status.destroy');
	    Route::get('status/{id}/restore', [StatusController::class, 'restore'])->name('status.restore');



	});

    Route::get('select2-load-status', [StatusController::class, 'select2LoadMore'])->name('status.select');


});
