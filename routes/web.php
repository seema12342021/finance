<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Projectcontroller; 
 use App\Http\Controllers\HomepageController; 
 use App\Http\Controllers\frontend\DashboardController; 
 use App\Http\Controllers\frontend\LoginController; 
 use App\Http\Controllers\frontend\SignupController; 
 use App\Http\Controllers\frontend\CheckoutController; 
 use App\Http\Controllers\frontend\ProfileController; 
 use App\Http\Controllers\frontend\TransactionController; 

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
Route::post('admin_login',[Logincontroller::class,'login']);
Route::get('logout',[Logincontroller::class,'logout']);
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

 });
 Route::get('/',[HomepageController::class ,'index']);
 Route::post('/save_singnup',[SignupController::class , 'saveSignUp']);
 Route::post('user_login',[LoginController::class,'user_login']);

Route::middleware("UserAuth")->group(function(){
    Route::get('/user-dashboard',[DashboardController::class ,'index']);
    Route::get('/checkout',[CheckoutController::class ,'index']);
    Route::get('/user_profile',[ProfileController::class ,'index']);
    Route::get('/user_kyc',[ProfileController::class ,'kyc_index']);
    Route::get('/user_setting',[ProfileController::class ,'setting_index']);
    Route::post('/update_profile',[ProfileController::class ,'UpdateProfile']);
    Route::get('/change_password',[ProfileController::class ,'ChangePasswordForm']);
    Route::post('/update_password',[ProfileController::class ,'UpdatePassword']);
    Route::post('/update_profile_img',[ProfileController::class ,'UpdateProfileimg']);
    Route::get('/transaction',[TransactionController::class ,'index']);
});


    
