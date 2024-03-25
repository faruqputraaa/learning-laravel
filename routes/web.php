<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class,'index']);

Route::get('/user',[HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/create',[HomeController::class, 'create'])->name('user.create');
Route::post('/store',[HomeController::class, 'store'])->name('user.store');

Route::get('/edit/{id}',[HomeController::class, 'edit'])->name('user.edit');
Route::put('/update/{id}',[HomeController::class, 'update'])->name('user.update');