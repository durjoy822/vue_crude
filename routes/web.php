<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return inertia::render('create');
//});
Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
Route::get('/',[CustomerController::class,'index'])->name('customer.index');
Route::post('customers',[CustomerController::class,'store']);
Route::delete('customers/{customer}',[CustomerController::class,'destroy']);
Route::get('/customers/{customer}/edit',[CustomerController::class,'edit']);
Route::put('/customers/{customer}',[CustomerController::class,'update']);
Route::get('/customer/{id}/show',[CustomerController::class,'show']);
