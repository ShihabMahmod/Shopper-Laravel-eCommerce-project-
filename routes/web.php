<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\homeController;
use App\Http\Controllers\user\shopController;
use App\Http\Controllers\user\cartController;
use App\Http\Controllers\user\checkouttController;
use App\http\Controllers\user\contactController;
use App\http\Controllers\user\aboutController;



use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\productController;

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
Route::get('/checkout',[checkouttController::class,'checkout']);
Route::get('/contact',[contactController::class,'contact']);
Route::get('/about',[aboutController::class,'about']);




Route::get('/admin-login',[loginController::class,'login']);
Route::post('/admin-login-try',[loginController::class,'admin_login_try']);
Route::get('/logo_out',[loginController::class,'logo_out']);

Route::group(['middleware'=>['authenticCheck']],function(){
    Route::get('/dashboard',[dashboardController::class,'dashboard']);

    Route::get('/category',[categoryController::class,'category']);
    Route::post('/add-category',[categoryController::class,'addCategory']);
    Route::get('/delete-category/{id}',[categoryController::class,'deleteCategory']);

    Route::get('/brand',[brandController::class,'brand']);
    Route::post('/add-brand',[brandController::class,'addBrand']);
    Route::get('/delete-brand/{id}',[brandController::class,'deleteBrand']);

    Route::get('/product',[productController::class,'product']);
    Route::post('/add-product',[productController::class,'addProduct']);
    Route::get('/update-product/{id}',[productController::class,'updateProduct']);
});