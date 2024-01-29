<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PickorderController;
use App\Models\Artikel;

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



Route::get('/', [ArtikelController::class, 'index'])->name("home");


//artikel routes
Route::get('/artikel/read/{id}', [ArtikelController::class, 'read'])->name("read_artikel");

Route::get('/artikel/create', [ArtikelController::class, 'create'])->name("create_artikel");
Route::post('/artikel/store', [ArtikelController::class, 'store'])->name("store_artikel");

Route::get('/artikel/edit/{id}', [ArtikelController::class, 'edit'])->name("edit_artikel");
Route::post('/artikel/update', [ArtikelController::class, 'update'])->name("update_artikel");

Route::get('/artikel/delete/{id}', [ArtikelController::class, 'delete'])->name("delete_artikel");

Route::get('/artikel/delete_confirm/{id}', [ArtikelController::class, 'deleteConfirm'])->name("delete_confirm_artikel");


//batch routes
Route::get('/batch/read/{id}', [BatchController::class, 'read'])->name("read_batch");

Route::get('/batch/create', [BatchController::class, 'create'])->name("create_batch");
Route::get('/batch/create/{artikel}', [BatchController::class, 'create'])->name("create_batch");
Route::post('/batch/store', [BatchController::class, 'store'])->name("store_batch");

Route::get('/batch/edit/{id}', [BatchController::class, 'edit'])->name("edit_batch");
Route::post('/batch/update', [BatchController::class, 'update'])->name("update_batch");

Route::get('/batch/delete/{id}', [BatchController::class, 'delete'])->name("delete_batch");


//pickorder routes
Route::get('/pickorder', [PickorderController::class, 'index'])->name('pickorder_home');
Route::get('/pickorder/selectBatch', [PickorderController::class, 'selectBatch'])->name('pickorder_select');
Route::get('/pickorder/calculate', [PickorderController::class, 'calculate'])->name('pickorder_calculate');
Route::get('/pickorder/downloadPDF/{id}', [PickorderController::class, 'downloadPDF'])->name('pickorder_downloadPDF');
