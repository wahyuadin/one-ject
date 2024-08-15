<?php

use App\Http\Controllers\ApiGET;
use App\Http\Controllers\AuthLogin;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Datates;
use App\Http\Controllers\Datauser;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Master;
use App\Http\Middleware\SesiFalse;
use App\Http\Middleware\SesiRule;
use App\Http\Middleware\SesiTrue;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('login');
});

Route::middleware([SesiTrue::class])->group(function () {
    // user
    // dashboard
    Route::any('/dashboard',[Dashboard::class, 'index']);
    // pretes
    Route::any('/pre',[Datates::class, 'pretes']);
    // postes
    Route::any('/post',[Datates::class, 'postes']);
    // kalender
    Route::get('kalender', [FullCalenderController::class, 'index']);
    Route::post('full-calender/action', [FullCalenderController::class, 'action']);
    // profile
    Route::any('profile/{id_user}',[Datauser::class,'profile']);
});
Route::middleware([SesiFalse::class])->group(function () {
    Route::get('/login',[AuthLogin::class,'index']);
    Route::post('/loginverif',[AuthLogin::class,'verif']);
    Route::get('/register', [AuthLogin::class, 'register']);
});
Route::middleware([SesiRule::class])->group(function () {
    // admin
    // ========//
    // kategori
    Route::any('/kategori',[KategoriController::class,'index']);
    Route::get('/kategori/edit/{id}',[KategoriController::class,'edit']);
    Route::post('/kategori/edit/simpan',[KategoriController::class,'editsimpan']);
    Route::get('/kategori/hapus/{id}',[KategoriController::class,'hapuskategori']);
    // data
    Route::any('/data',[Master::class,'index']);
    Route::any('/data/edit/{id}',[Master::class,'editdata']);
    Route::get('/data/hapus/{id}',[Master::class,'hapusdata']);
    // management user
    Route::get('/user',[Datauser::class,'index']);
    Route::get('/user/edit/{id}',[Datauser::class,'editdata']);
    Route::post('/user/edit/simpan',[Datauser::class,'simpandata']);
    Route::get('/user/hapus/{id}',[Datauser::class,'hapusdata']);
});
Route::get('/logout', [Dashboard::class, 'logout']);
Route::any('/get',[ApiGET::class,'index']);
Route::get('/update/{id}',[ApiGET::class,'update']);
Route::post('/update/prosesupdate',[ApiGET::class,'prosesupdate']);
Route::get('/hapus/{id}',[ApiGET::class,'hapus']);

route::get('/riyandi',[ApiGET::class,'riyandi']);




