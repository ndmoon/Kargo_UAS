<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;


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

Route::get('/', function () {
    return view('forntend.home');
});

// Route::get('/home', function () {
//     return view('forntend.home');
// });

Route::get('/wilayah', function () {
    return view('forntend.wilayah');
});

// Route::get('/backend/kargo', function () {
//     return view('backend.index');
// });

Route::get('/armadas',[\App\Http\Controllers\ArmadaForntendController::class, 'index']);

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');;
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerAcc']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/backend',[\App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/backend-customers',[\App\Http\Controllers\CustomerController::class, 'index']);
Route::post('/backend-customers',[\App\Http\Controllers\CustomerController::class, 'store']);
Route::get('/backend-customers/create',[\App\Http\Controllers\CustomerController::class, 'create']);
Route::get('/backend-customers/{id}/edit',[\App\Http\Controllers\CustomerController::class, 'edit']);
Route::resource('backend-customers',\App\Http\Controllers\CustomerController::class);
Route::delete('/backend-customers/{id}',[\App\Http\Controllers\CustomerController::class, 'destroy']);

Route::get('/backend-armadas',[\App\Http\Controllers\ArmadaController::class, 'index']);
Route::post('/backend-armadas',[\App\Http\Controllers\ArmadaController::class, 'store']);
Route::get('/backend-armadas/create',[\App\Http\Controllers\ArmadaController::class, 'create']);
Route::get('/backend-armadas/{id}/edit',[\App\Http\Controllers\ArmadaController::class, 'edit']);
Route::resource('backend-armadas',\App\Http\Controllers\ArmadaController::class);
Route::delete('/backend-armadas/{id}',[\App\Http\Controllers\ArmadaController::class, 'destroy']);


Route::get('/backend-orders', [OrderController::class, 'index']);
Route::post('/backend-orders', [OrderController::class, 'store']);
Route::get('/backend-orders/create', [OrderController::class, 'create']);
Route::get('/backend-orders/{id}/edit',[OrderController::class, 'edit']);
Route::resource('backend-orders', OrderController::class);

Route::delete('/backend-orders/{id}',[OrderController::class, 'destroy']);

Route::get('/backend-orderStatus', [OrderStatusController::class, 'index']);
Route::post('/backend-orderStatus', [OrderController::class, 'store']);
Route::get('/backend-orderStatus/{id}/edit', [OrderStatusController::class, 'edit']);
Route::delete('/backend-orderStatus/{id}', [OrderStatusController::class,'destroy']);
Route::resource('backend-orderStatus', OrderStatusController::class);

