<?php

namespace App\Providers;
use App\Models\user\cart;
use App\Models\user\wishlist;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) 
    {
        $user_email =  Session::get('user_email');
        $cart = new cart;
        $wishlist = new wishlist;
         $noOfItem = $cart::where('user_email',$user_email)->get()->count();
         $noOfItemwishlist = $wishlist::where('user_email',$user_email)->get()->count(); 
        $view->with(['noOfItem'=>$noOfItem,'noOfItemwishlist'=>$noOfItemwishlist]);    
    });  
    }
}
