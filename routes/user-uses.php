<?php

use App\Http\Controllers\Active\LoginController;
use App\Http\Controllers\Active\ReaderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login-active',[LoginController::class,'index']);
Route::post('/login-active',[LoginController::class,'store']);

Route::group(['middleware'=>'auth:active'],function(){
    Route::get('/active-home',[ReaderController::class,'index'])->name('active.home');

    Route::get('/logout-active',[ReaderController::class,'logOut']);
    
    Route::get('/qr-{id}',[ReaderController::class,'showData'])->name('active.qrreader');
    
    Route::get('/show-data-{id}',[ReaderController::class,'moveStatus']);
    Route::post('/show-data-many',[ReaderController::class,'moveStatusMany']);

    Route::get('/persons-event',[ReaderController::class,'allPer']);
});