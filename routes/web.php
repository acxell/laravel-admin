<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BarangController;
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

// Route::get('/',
// use App\Models\barang;

//  function () {
//     return view('welcome');
// });
Route::get('/home-barang',[BarangController::class,'homebarang']);
Route::get('/add-barang',[BarangController::class,'admin_addbarang']);
Route::get('/edit-barang/{id}',[BarangController::class,'admin_editbarang']);

//fungsi
Route::get('/add',[BarangController::class,'add_adminbarang']);
Route::get('/edit',[BarangController::class,'edit_adminbarang']);
Route::get('/delete/{id}',[BarangController::class,'deleteadminbarang']);



Route::get('/index-transaksi',[TransaksiController::class,'hometransaksi']);
Route::get('/index-add',[TransaksiController::class,'admin_addtransaksi']);
Route::get('/index-edit/{id}',[TransaksiController::class,'admin_edittransaksi']);

//fungsi
Route::get('/add-transaksi',[TransaksiController::class,'add_admintransaksi']);
Route::get('/edit-transaksi',[TransaksiController::class,'edit_admintransaksi']);
Route::get('/delete-transaksi/{id}',[TransaksiController::class,'delete_admintransaksi']);





