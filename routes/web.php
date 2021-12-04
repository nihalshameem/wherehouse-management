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

Route::get('/get-lot-numbers/{id}', [App\Http\Controllers\CommonController::class, 'lot_numbers']);
Route::get('/get-wh-names/{id}', [App\Http\Controllers\CommonController::class, 'wh_names']);

// receipt
Route::get('/receipts', [App\Http\Controllers\ReceiptController::class, 'index']);
Route::post('/receipt/add', [App\Http\Controllers\ReceiptController::class, 'addPost']);
Route::post('/receipt/edit/{id}', [App\Http\Controllers\ReceiptController::class, 'edit']);
Route::post('/receipt/update/{id}', [App\Http\Controllers\ReceiptController::class, 'update']);
Route::post('/receipt/delete/{id}', [App\Http\Controllers\ReceiptController::class, 'delete']);

// consumption
Route::get('/consumptions', [App\Http\Controllers\ConsumptionController::class, 'index']);
Route::post('/consumption/add', [App\Http\Controllers\ConsumptionController::class, 'addPost']);
Route::post('/consumption/edit/{id}', [App\Http\Controllers\ConsumptionController::class, 'edit']);
Route::post('/consumption/update/{id}', [App\Http\Controllers\ConsumptionController::class, 'update']);
Route::post('/consumption/delete/{id}', [App\Http\Controllers\ConsumptionController::class, 'delete']);

// shifting
Route::get('/shiftings', [App\Http\Controllers\ShiftingController::class, 'index']);
Route::post('/shifting/add', [App\Http\Controllers\ShiftingController::class, 'addPost']);
Route::post('/shifting/edit/{id}', [App\Http\Controllers\ShiftingController::class, 'edit']);
Route::post('/shifting/update/{id}', [App\Http\Controllers\ShiftingController::class, 'update']);
Route::post('/shifting/delete/{id}', [App\Http\Controllers\ShiftingController::class, 'delete']);
