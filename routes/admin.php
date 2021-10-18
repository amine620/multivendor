<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'auth:admin'],function(){
   Route::get('/',[DashboardController::class,"index"])->name('admin');
});

Route::group(['middleware'=>"guest:admin"],function(){

    // show login page
    Route::get('login',[LoginController::class,'login'])->name('admin.login');
    // login action
    Route::post('login', [LoginController::class, 'store'])->name('admin.login.store');

});