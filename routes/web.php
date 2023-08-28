<?php

use App\Http\Controllers\Admin\TelrController;
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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/',[WebController::class,'index']);
Route::get('/contact',[WebController::class,'contact']);
Route::get('/privacy',[WebController::class,'privacy']);

Route::get('/rate-event',[WebController::class,'rateEvent']);
Route::get('/rate-subject',[WebController::class,'rateSubject']);

Route::get('/ticket-55{id}432{id2}1a',[WebController::class,'ticket']);


//telr
Route::post('/check-out/telr',[TelrController::class,'checkOut']);

Route::get('/handle-payment/success', [TelrController::class, 'success']);
Route::get('/handle-payment/cancel', [TelrController::class, 'cancel']);
Route::get('/handle-payment/declined', [TelrController::class, 'declined']);