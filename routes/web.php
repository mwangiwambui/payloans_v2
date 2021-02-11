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
Route::get('/loan_application', 'App\Http\Controllers\FrontendController@loan_application')->name('loan_application')->middleware('auth:sanctum');
Route::get('/loan_calculation', 'App\Http\Controllers\FrontendController@loan_calculation')->name('loan_calculation')->middleware('auth:sanctum');

Route::resource('loans' ,'App\Http\Controllers\LoanController')->middleware('auth:sanctum');
Route::get('/view_loans' ,'App\Http\Controllers\LoanApprovalsController@get_loans')->name('backend.loans.view')->middleware('auth:sanctum');
Route::post('/approve_loans' ,'App\Http\Controllers\LoanApprovalsController@approve_loans')->name('backend.loans.approve')->middleware('auth:sanctum');
Route::get('/view_all_loans' ,'App\Http\Controllers\LoanApprovalsController@view_loans')->name('loans')->middleware('auth:sanctum');

Route::get('view_loans/{loan_Applications}','App\Http\Controllers\FrontendController@loan_details')->name('loan-details')->middleware('auth:sanctum');
Route::post('send_confirm_email','App\Http\Controllers\LoanApprovalsController@send_email_loan')->name('send.confirmation.email')->middleware('auth:sanctum');

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from Loans Mzima Sacco',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('wambui54mwangi@gmail.com')->send(new \App\Mail\Gmail($details));

    dd("Email is Sent.");
});

Route::get('approve_guarantor/{id}', 'App\Http\Controllers\LoanApprovalsController@approve_guarantor')->name('approve.guarantor')->middleware('auth:sanctum');;
Route::get('/view_my_loans', 'App\Http\Controllers\LoanApprovalsController@view_my_loans')->name('view.personal.loans')->middleware('auth:sanctum');;
Route::get('/all_loans', 'App\Http\Controllers\LoanApprovalsController@get_all_loans')->name('all.loans')->middleware('auth:sanctum');;
Route::get('/admin_dashboard','App\Http\Controllers\FrontendController@admin_dashboard')->name('admin.dashboard')->middleware('auth:sanctum');;
Route::get('view_client/{id}','App\Http\Controllers\LoanApprovalsController@view_client_loans')->name('loans.client.view')->middleware('auth:sanctum');;
Route::get('/get_guarantor/{id}','App\Http\Controllers\LoanApprovalsController@get_guarantor_details')->name('loans.guarantor.view')->middleware('auth:sanctum');
Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');
//
//    Route::get('/user', 'App\Http\Controllers\UserController@index_view')->name('user');
//    Route::view('/user/new', "admin.pages.user.user-new")->name('user.new');
//    Route::view('/user/edit/{userId}', "admin.pages.user.user-edit")->name('user.edit');
});
