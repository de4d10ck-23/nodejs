<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});
    Route::get('dashboard', [NoteController::class, 'dashboard'])->name('dashboard');
    Route::post('note/add', [NoteController::class, 'addNote'])->name('addNote');
    Route::get('note/{note}/edit', [NoteController::class, 'editNote'])->name('editNote');
    Route::put('note/{note}', [NoteController::class, 'updateNote'])->name('updateNote');
    Route::delete('note/{note}', [NoteController::class, 'deleteNote'])->name('deleteNote');
