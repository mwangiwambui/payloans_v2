<?php

use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\FrontendController;
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

//Route::get('/', function () {
//    return view('dashboard');
//});
Route::get('/', 'App\Http\Controllers\FrontendController@index')->name('home');
Route::get('/apply_loan', 'App\Http\Controllers\FrontendController@application')->name('application')->middleware('auth:sanctum');
Route::get('/about', 'App\Http\Controllers\FrontendController@about')->name('about');
Route::get('/service_details', 'App\Http\Controllers\FrontendController@service_details')->name('service_details');
Route::get('/services', 'App\Http\Controllers\FrontendController@services')->name('services');
//Route::get('/service_details', 'App\Http\Controllers\FrontendController@service_details')->name('service_details');
Route::get('/service', 'App\Http\Controllers\FrontendController@service')->name('service');
Route::get('/loan_application', 'App\Http\Controllers\FrontendController@loan_application')->name('loan_application');
Route::get('/loan_calculation', 'App\Http\Controllers\FrontendController@loan_calculation')->name('loan_calculation');

Route::resource('loans' ,'App\Http\Controllers\LoanController');





Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');
//
//    Route::get('/user', 'App\Http\Controllers\UserController@index_view')->name('user');
//    Route::view('/user/new', "admin.pages.user.user-new")->name('user.new');
//    Route::view('/user/edit/{userId}', "admin.pages.user.user-edit")->name('user.edit');
});
