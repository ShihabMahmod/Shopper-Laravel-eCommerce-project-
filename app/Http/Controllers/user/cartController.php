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
        $product = new product;

        $user_email = Session()->get('user_email');
        $myCart = $cart::where('user_email',$user_email)->get()->all();

        $total = 0;

       foreach($myCart as $cart){
         $total = $total + $cart->product_quantity * $cart->product_price ;
       }
       $most_view = $product->orderBy('views','DESC')->take(5)->get();

        return view('user.cart',['mycart'=>$myCart,'total_price'=>$total,'most_view'=>$most_view]);
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
        $cart->product_quantity = $req->input('product-quatity');
        $cart->product_size     = $req->input('product_size');
        $cart->product_color    = $req->input('product_color');
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
