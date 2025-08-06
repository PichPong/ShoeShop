<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShoeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function(){
//     return view('shoes.create');
// })->name('shoes.create');

Route::get('/', function(){
    return view('Auth.login');
})->name('Auth.login');

Route::post('/Auth/register_submit/', [AuthController::class, 'register_submit'])->name('Auth.register_submit');
Route::get('/Auth/login/', [AuthController::class, 'login'])->name('Auth.login');
Route::post('/Auth/login_submit/', [AuthController::class, 'login_submit'])->name('Auth.login_submit');
Route::get('/Auth/logout/', [AuthController::class, 'logout'])->name('Auth.logout');

Route::get('shoes/create/', [ShoeController::class, 'create'])->name('shoes.create');
Route::post('/shoes/store/', [ShoeController::class, 'store'])->name('shoes.store');
Route::get('/shoes/show/', [ShoeController::class, 'show'])->name('shoes.show');
Route::get('/shoes/edit/{id}', [ShoeController::class, 'edit'])->name('shoes.edit');
Route::post('/shoes/update{id}', [ShoeController::class, 'update'])->name('shoes.update');
Route::get('/shoes/delete{id}', [ShoeController::class, 'delete'])->name('shoes.delete');
