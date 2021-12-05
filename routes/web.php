<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test']);

Route::get('/get-lot-numbers/{id}', [App\Http\Controllers\CommonController::class, 'lot_numbers']);
Route::get('/get-wh-names/{id}', [App\Http\Controllers\CommonController::class, 'wh_names']);

// receipt
Route::get('/receipt', [App\Http\Controllers\ReceiptController::class, 'index']);
Route::post('/receipt/add', [App\Http\Controllers\ReceiptController::class, 'addPost']);
Route::get('/receipt/edit/{id}', [App\Http\Controllers\ReceiptController::class, 'edit']);
Route::post('/receipt/update/{id}', [App\Http\Controllers\ReceiptController::class, 'update']);
Route::get('/receipt/delete/{id}', [App\Http\Controllers\ReceiptController::class, 'delete']);

// consumption
Route::get('/consumption', [App\Http\Controllers\ConsumptionController::class, 'index']);
Route::post('/consumption/add', [App\Http\Controllers\ConsumptionController::class, 'addPost']);
Route::get('/consumption/edit/{id}', [App\Http\Controllers\ConsumptionController::class, 'edit']);
Route::post('/consumption/update/{id}', [App\Http\Controllers\ConsumptionController::class, 'update']);
Route::get('/consumption/delete/{id}', [App\Http\Controllers\ConsumptionController::class, 'delete']);

// shifting
Route::get('/shifting', [App\Http\Controllers\ShiftingController::class, 'index']);
Route::post('/shifting/add', [App\Http\Controllers\ShiftingController::class, 'addPost']);
Route::get('/shifting/edit/{id}', [App\Http\Controllers\ShiftingController::class, 'edit']);
Route::post('/shifting/update/{id}', [App\Http\Controllers\ShiftingController::class, 'update']);
Route::get('/shifting/delete/{id}', [App\Http\Controllers\ShiftingController::class, 'delete']);

// purchase-order
Route::get('/purchase-order', [App\Http\Controllers\PurchaseOrderController::class, 'index']);
Route::post('/purchase-order/add', [App\Http\Controllers\PurchaseOrderController::class, 'addPost']);
Route::get('/purchase-order/edit/{id}', [App\Http\Controllers\PurchaseOrderController::class, 'edit']);
Route::post('/purchase-order/update/{id}', [App\Http\Controllers\PurchaseOrderController::class, 'update']);
Route::get('/purchase-order/delete/{id}', [App\Http\Controllers\PurchaseOrderController::class, 'delete']);
