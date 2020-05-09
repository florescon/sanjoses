<?php
use App\Http\Controllers\NoteController;

Route::group(['namespace' => 'Note'], function () {

    Route::get('note', [NoteController::class, 'index'])->name('note.index');
    Route::get('note/personal', [NoteController::class, 'indexpersonal'])->name('note.indexpersonal');
    Route::post('note', [NoteController::class, 'store'])->name('note.store');
    Route::patch('note', [NoteController::class, 'update'])->name('note.update');
    Route::delete('note/{id}', [NoteController::class, 'destroy'])->name('note.destroy');

    Route::get('search', [NoteController::class, 'search'])->name('note.search');

});
