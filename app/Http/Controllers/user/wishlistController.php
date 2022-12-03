<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user\wishlist;
use App\Models\admin\product;
use Session;

class wishlistController extends Controller
{
   
    public function wishlist()
    {
        $wishlist = new wishlist;
        $user_email = Session::get('user_email');
        $myWishlist = $wishlist::where('user_email',$user_email)->get()->all();

        return view('user.wishlist',['myWishlist'=>$myWishlist]);
        
    }
    public function addWishlist($id)
    {
        $wishlist = new wishlist;
        $product = new product;

        
        $user_email = Session::get('user_email');

        $wishlistProduct = $product::find($id);
        
        $wishlist->user_email     = $user_email;
        $wishlist->product_name   = $wishlistProduct->product_name;
        $wishlist->product_price  = $wishlistProduct->product_reguler_price;
        $wishlist->product_image  = $wishlistProduct->product_image;
        $wishlist->product_id     = $wishlistProduct->id;

        $wishlist->save();

        if($wishlist){
            return redirect('/wishlist');
        }

    }
    public function deleteFromWishlist($id)
    {
        $wishlist = new wishlist;
        $delete = $wishlist::where('id',$id)->delete();

        if($delete){
            return redirect('/wishlist');
        }

    }
    
}
