<?php
use App\Http\Controllers\DocumentationController;

Route::group([
    'prefix' => 'documentation',
    'as' => 'documentation.',
    'namespace' => 'Documentation',
], function () {

    Route::get('index', [DocumentationController::class, 'index'])->name('index');
    Route::get('start', [DocumentationController::class, 'start'])->name('start');
    Route::get('documentation', [DocumentationController::class, 'documentation'])->name('documentation');
    Route::get('faqs', [DocumentationController::class, 'faqs'])->name('faqs');
    Route::get('license', [DocumentationController::class, 'license'])->name('license');

});
