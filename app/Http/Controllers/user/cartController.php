<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\product;
use App\Models\user\cart;

use Session;

class cartController extends Controller
{
    public function cart()
    {
        $cart = new cart;
        $user_email = Session()->get('user_email');
        $myCart = $cart::where('user_email',$user_email)->get();

        $total_price = $cart::where('user_email',$user_email)->sum('product_price');

        return view('user.cart',['mycart'=>$myCart,'total_price'=>$total_price]);
    }
    public function addCart(Request $req)
    {
        $product = new product;
        $cartData = $product::find($req->id);
        $user_email = Session()->get('user_email');
        
        $cart = new cart;
        
        $cart->user_email	    = $user_email;
        $cart->product_name     = $cartData->product_name;
        $cart->product_price    = $cartData->product_reguler_price;
        $cart->product_quantity = $req->input('product_quatity');
        $cart->product_image    = $cartData->product_image;
        $cart->product_id       = $cartData->id;

        $cart->save();
        

         if($cart){
             return redirect('/');
         }

    }
    public function deleteFormCart($id)
    {
         $cart = new cart;
         $myCart = $cart->where('id',$id)->delete();

        return redirect('/cart');
    }
    public function clearCart()
    {
        $cart = new cart;
        $user_email = Session()->get('user_email');
        $delete_cart = $cart::where('user_email',$user_email)->delete();
        return $delete_cart;
    }
}
