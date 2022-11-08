<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\homeController;
use App\Http\Controllers\user\shopController;
use App\Http\Controllers\user\cartController;



use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\loginController;

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

Route::get('/',[homeController::class,'home']);
Route::get('/shop',[shopController::class,'shop']);
Route::get('/cart',[cartController::class,'cart']);


Route::get('/dashboard',[dashboardController::class,'dashboard']);
Route::get('/login',[loginController::class,'login']);