<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CommisionFeesController;
use App\Http\Controllers\NetworkFeesController;
use App\Http\Controllers\TransactionController;
// use App\Http\Controllers\Dashboard;
 use App\Http\Controllers\Projectcontroller; 
 use App\Http\Controllers\HomepageController; 
 use App\Http\Controllers\frontend\DashboardController; 
 use App\Http\Controllers\frontend\LoginController; 
 use App\Http\Controllers\frontend\SignupController; 

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('admin','admin.login')->name("admin");
Route::post('admin_login',[AdminLoginController::class,'Adminlogin']);
Route::get('logout',[AdminLoginController::class,'logout']);
Route::middleware("AdminLogin")->group(function(){
    Route::get('dashboard',[Dashboard::class,'index']);
    //testimonial
    Route::get('/project',[Projectcontroller::class ,'index']);
    Route::post('/save_project',[Projectcontroller::class , 'saveProject']);
    Route::get('/show_project',[Projectcontroller::class ,'showProject']);
    Route::get('/delete_project',[Projectcontroller::class , 'deleteProject']);
    Route::get('/edit_project',[Projectcontroller::class , 'editProject']);
    Route::get('/status_project',[Projectcontroller::class , 'statusProject']);
    Route::get('/view_modal',[Projectcontroller::class ,'viewModel']);

    // **************************Commision**************************************

    Route::get('/commision',[CommisionFeesController::class ,'index']);
    Route::post('/save_commision',[CommisionFeesController::class , 'save']);
    Route::get('/show_commision',[CommisionFeesController::class ,'show']);
    Route::get('/delete_commision',[CommisionFeesController::class , 'delete']);
    Route::get('/edit_commision',[CommisionFeesController::class , 'edit']);
    Route::get('/status_commision',[CommisionFeesController::class , 'status']);

    // **************************NetworkFeesnetwork**************************************

    Route::get('/network',[NetworkFeesController::class ,'index']);
    Route::post('/save_network',[NetworkFeesController::class , 'save']);
    Route::get('/show_network',[NetworkFeesController::class ,'show']);
    Route::get('/delete_network',[NetworkFeesController::class , 'delete']);
    Route::get('/edit_network',[NetworkFeesController::class , 'edit']);
    Route::get('/status_network',[NetworkFeesController::class , 'status']);

    // **************************Transaction**************************************

    Route::get('/transactionSell',[TransactionController::class ,'transactionSell']);
    Route::get('/show_transactionSell',[TransactionController::class ,'show_transactionSell']);
    Route::get('/transactionBuy',[TransactionController::class ,'transactionBuy']);
    Route::get('/show_transactionBuy',[TransactionController::class ,'show_transactionBuy']);
    // Route::post('/save_network',[TransactionController::class , 'save']);
    // Route::post('/save_network',[TransactionController::class , 'save']);
    // Route::get('/delete_network',[TransactionController::class , 'delete']);
    // Route::get('/edit_network',[TransactionController::class , 'edit']);
    // Route::get('/status_network',[TransactionController::class , 'status']);

 });
 Route::get('/',[HomepageController::class ,'index']);
 Route::post('/save_singnup',[SignupController::class , 'saveSignUp']);
 Route::post('user_login',[LoginController::class,'user_login']);

Route::middleware("UserAuth")->group(function(){
    Route::get('/user-dashboard',[DashboardController::class ,'index']);
});


    