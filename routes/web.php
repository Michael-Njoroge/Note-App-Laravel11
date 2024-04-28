<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('welcome');

// Route::get('/note', [NoteController::class,'index'])->name('note.index');
// Route::get('/note/create', [NoteController::class,'create'])->name('note.create');
// Route::post('/note', [NoteController::class,'store'])->name('note.store');
// Route::get('/note/{id}', [NoteController::class,'show'])->name('note.show');
// Route::get('/note/{id}/edit', [NoteController::class,'edit'])->name('note.edit');
// Route::put('/note/{id}', [NoteController::class,'update'])->name('note.update');
// Route::delete('/note/{id}', [NoteController::class,'destroy'])->name('note.destroy');

// Route::group(['middleware' => 'auth'], function(){
    Route::resource('note',NoteController::class);
    Route::resource('user',UserController::class);
// });

Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'auth'])->name('user.auth');
Route::get('/logout', [UserController::class,'logout'])->name('user.logout');






