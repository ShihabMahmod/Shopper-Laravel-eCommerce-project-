<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\homeController;
use App\Http\Controllers\user\shopController;
use App\Http\Controllers\user\cartController;
use App\Http\Controllers\user\checkouttController;
use App\Http\Controllers\user\contactController;
use App\Http\Controllers\user\aboutController;
use App\Http\Controllers\user\userDataController;
use App\Http\Controllers\user\wishlistController;



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
Route::get('/login',[userDataController::class,'login']);
Route::post('/user-login',[userDataController::class,'userLogdin']);

Route::group(['middleware'=>['userAuthentication']],function(){

    Route::get('/register',[userDataController::class,'register']);
    Route::post('/create-account',[userDataController::class,'createAccount']);


    Route::get('/user-log-out',[userDataController::class,'userLogOut']);

    Route::post('/add-cart/{id}',[cartController::class,'addCart']);
    Route::get('/delete-from-cart/{id}',[cartController::class,'deleteFormCart']);
    Route::get('/clear-cart',[cartController::class,'clearCart']);

    Route::get('/wishlist',[wishlistController::class,'wishlist']);
    Route::get('/add-wishlist/{id}',[wishlistController::class,'addWishlist']);
    Route::get('/delete-from-wishlist/{id}',[wishlistController::class,'deleteFromWishlist']);

    
    Route::post('/add-to-cart/{id}',[shopController::class,'addToCart']);
    Route::post('/add-to-cart-from-wishlist/{id}',[shopController::class,'addToCartFromWishlist']);
    
    
});
Route::get('/product-details/{id}',[homeController::class,'productDetails']);






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
    Route::put('/updated-selected-product/{id}',[productController::class,'updatedSelectedProduct']);

    Route::get('/image-galley',[productController::class,'imageGalley']);
    Route::get('/update-product-image/{id}',[productController::class,'updateProductImages']);
    Route::put('/updated-selected-product-images/{id}',[productController::class,'updatSelectedProductImages']);

    
});