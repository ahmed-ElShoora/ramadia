<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\RateController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware'=>['changeLang','api.password']
],function (){
    Route::get('/contact',[ContactController::class,'index']);
    Route::post('/contact',[ContactController::class,'store']);

    Route::get('/setting',[SettingController::class,'index']);

    Route::get('/about',[AboutController::class,'index']);
    Route::get('/about-sliders',[AboutController::class,'sliders']);

    Route::get('/events-{id}',[EventController::class,'index']);

    Route::post('/add-rate',[RateController::class,'index']);

    Route::get('/get-privacy',[SettingController::class,'privacy']);
});
