<?php

use App\Exports\ContactExport;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CobonController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\RateController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'auth'],function(){
    Route::get('/logout', [HomeController::class, 'logOut']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/admins',[AdminController::class,'index'])->name('admin.admins');
    Route::get('/admin-delete-{id}',[AdminController::class,'delete'])->name('admin.admin.delete');
    Route::get('/admin-create',[AdminController::class,'create'])->name('admin.create.admin');
    Route::post('/admin-create',[AdminController::class,'store'])->name('admin.create.admin.store');
    
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact_us');
    Route::get('/contact-us-delete-{id}', [ContactUsController::class, 'delete']);
    Route::post('/contact-us', [ContactUsController::class, 'updateImage'])->name('contact_us.store');
    Route::post('/contact-us-filter', [ContactUsController::class, 'filter']);
    
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting', [SettingController::class, 'store'])->name('setting.store');
    
    Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');//about and show sliders
    Route::post('/about-us', [AboutController::class, 'store'])->name('about-us.store');// update about
    
    Route::get('/create-slider', [SliderController::class, 'create']);
    Route::post('/create-slider', [SliderController::class, 'store']);
    Route::get('/edite-slider-{id}', [SliderController::class, 'edit']);
    Route::post('/edite-slider', [SliderController::class, 'update']);
    Route::get('/delete-slider-{id}', [SliderController::class, 'delete']);
    
    
    Route::get('/events', [EventController::class, 'index']);
    Route::post('/events-filter', [EventController::class, 'filter']);
    Route::get('/events-create', [EventController::class, 'create']);
    Route::post('/events-create', [EventController::class, 'store']);
    Route::get('/events-edit-{id}', [EventController::class, 'edit']);
    Route::post('/events-edit', [EventController::class, 'update']);
    Route::get('/events-subscripe-{id}', [EventController::class, 'subscripe']);
    Route::post('/events-subscripe-filter', [EventController::class, 'subscripeStore']);
    Route::get('/events-delete-{id}', [EventController::class, 'delete']);
    
    
    Route::get('/subjects', [SubjectController::class, 'index']);
    Route::post('/subjects-filter', [SubjectController::class, 'filter']);
    Route::get('/subjects-create', [SubjectController::class, 'create']);
    Route::post('/subjects-create', [SubjectController::class, 'store']);
    Route::get('/subjects-edit-{id}', [SubjectController::class, 'edit']);
    Route::post('/subjects-edit', [SubjectController::class, 'update']);
    Route::get('/subjects-subscripe-{id}', [SubjectController::class, 'subscripe']);
    Route::post('/subjects-subscripe-filter', [SubjectController::class, 'subscripeStore']);
    Route::get('/subjects-delete-{id}', [SubjectController::class, 'delete']);
    
    Route::get('/qr-perosn-{id}',[EventController::class, 'personsal']);

    Route::get('/rates',[RateController::class,'index']);
    
    Route::get('/not-pay', [PaymentController::class, 'index']);
    
    Route::get('/move-status-{id}',[PaymentController::class, 'moveStatus']);


    Route::get('/add-active',[PaymentController::class,'addActive']);
    Route::post('/add-active',[PaymentController::class,'addActiveStore']);

    Route::get('/export-{id}',[PaymentController::class, 'exportPayments']);
    Route::get('/cobon-{id}',[PaymentController::class, 'exportCobons']);
    Route::get('/save-data',[PaymentController::class, 'exportRates']);
    Route::get('/active-data-{id}',[PaymentController::class, 'exportActive']);

    Route::get('/cobons',[CobonController::class,'index']);
    Route::post('/create-cobon',[CobonController::class,'store']);
    Route::get('/delete-cobon-{id}',[CobonController::class,'delete']);
    Route::get('/get-data-cobon-{id}',[CobonController::class,'getDataCobon']);
    
    
    Route::get('/delete-qr-person-{id}', [SubjectController::class, 'deleterPerson']);

    Route::get('/extraxt-not-pay',function(){
        return Excel::download(new App\Exports\PaymentTwoExport, 'not-pay.xlsx');
    });

    Route::get('/extraxt-contact',function(){
        return Excel::download(new ContactExport, 'contact.xlsx');
    });
});
