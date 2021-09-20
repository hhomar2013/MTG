<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DailyTicketController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\TicketController;
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




//Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Auth::routes(['register'=>false]);
    Route::get('/', function () {
        return view('auth.login');
    });
    Route::group(['middleware' => ['auth']], function() {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
//        ---------------------------------------------------------------------
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/search_ticket',[CustomersController::class,'SearchTicket'])->name('search_ticket');
    Route::get('/check_ticket',[CustomersController::class,'check_ticket'])->name('check_ticket');
    Route::resource('ticket', TicketController::class);
    Route::get('/ticket_list',[TicketController::class,'show'])->name('ticket_list');
    Route::resource('customer', CustomersController::class);
    Route::get('/reservation/{id}',[CustomersController::class,'reservation'])->name('reservation');
    Route::post('/reservation',[CustomersController::class,'store_reservation'])->name('re_store');
    Route::post('/ticket',[CustomersController::class,'store_daily_ticket'])->name('daily_ticket');
    Route::get('/print/{id}',[CustomersController::class,'print'])->name('QR_print');
    Route::resource('college', CollegeController::class);
    Route::resource('area', AreaController::class);
    Route::resource('pricelist', PriceListController::class);
    Route::get('/tickets/{id}', [DailyTicketController::class,'index'])->name('daily_tickets');
    Route::get('/customer_list', [DailyTicketController::class,'show'])->name('customer_list');
    Route::get('/tickets_main', [DailyTicketController::class,'tickets_main'])->name('tickets_main');
    Route::post('/ticket_report', [DailyTicketController::class,'ticket_report'])->name('ticket_report');
    });

    Route::get('/{page}', [AdminController::class,'index']);
});



