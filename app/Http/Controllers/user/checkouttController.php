<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user\cart;

class checkouttController extends Controller
{
    public function checkout()
    {
        $cart = new cart;

        $user_email = Session()->get('user_email');
        $total_price = $cart::where('user_email',$user_email)->sum('product_price');

        return view('user.checkout',['total_price'=>$total_price]);
    }
    public function success()
    {
        return view('user.success');
    }
}
