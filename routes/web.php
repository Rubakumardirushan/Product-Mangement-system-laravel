<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Logincontroller;
use App\Http\Controllers\Auth\Registercontroller;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/','auth.register')->middleware('guest');
Route::post('store',[Registercontroller::class,'register'])->name('auth.register');

Route::view('login','auth.login')->middleware('guest')->name('login');
Route::post('authendicate',[Logincontroller::class,'authendicate'])->name('auth.login');
Route::get('logout',[Logincontroller::class,'logout']);


Route::get('/create', [ProductController::class, 'ProductUploadForm'])->middleware('auth')->name('products.create');
Route::post('/products', [ProductController::class, 'ProductUploader'])->middleware('auth')->name('products.store');
Route::get('/View', [ProductController::class, 'showproduct'])->middleware('auth')->name('products.show');
Route::get('/update/{product}', [ProductController::class, 'updateview'])->middleware('auth')->name('products.updateview');
Route::put('/update/{product}', [ProductController::class, 'updated'])->middleware('auth')->name('products.update');
Route::get('/delete', [ProductController::class, 'deleteview'])->middleware('auth')->name('products.delete');
Route::post('/delete/{product}', [ProductController::class, 'destroy'])->middleware('auth')->name('products.destroy');
