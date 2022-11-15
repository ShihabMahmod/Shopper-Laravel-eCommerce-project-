<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\product;
use App\Models\user\cart;

class cartController extends Controller
{
    public function cart()
    {
        return view('user.cart');
    }
    public function addCart(Request $req)
    {
        $product = new product;
        $cartData = $product::find($id);
        
        $cart = new cart;

        $cart->product_name     = $cartData->product_name;
        $cart->product_price    = $cartData->product_reguler_price;
        $cart->product_quantity = $req->input('product_quatity');
        $cart->product_image    = $cartData->product_image;
        $cart->product_id       = $cartData->id;

        return "fuck you";
        
        // $cart->save();

        // if($cart){
        //     return redirect('/');
        // }

    }
}
