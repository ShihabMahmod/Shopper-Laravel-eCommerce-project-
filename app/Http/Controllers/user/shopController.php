<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\product;
use App\Models\user\cart;
use App\Models\user\wishlist;
use App\Models\admin\category;
use App\Models\subCategory;
use App\Models\brand;


class shopController extends Controller
{
    public function shop()
    {
        $product = new product;
        $category = new category;
        $brand    = new brand;

        $productList = $product::all();
        $categoryList = $category::all();
        $brandList =$brand::all();

        return view('user.shop',['productList'=>$productList,'categoryList'=>$categoryList,'brandList'=>$brandList]);
    }
    public function addToCart($id)
    {
        $product = new product;
        $cartData = $product::find($req->id);
        $user_email = Session()->get('user_email');
        
        $cart = new cart;
        
        $cart->user_email	    = $user_email;
        $cart->product_name     = $cartData->product_name;
        $cart->product_price    = $cartData->product_reguler_price;
        $cart->product_quantity = 1;
        $cart->product_image    = $cartData->product_image;
        $cart->product_id       = $cartData->id;
 
         $cart->save();
         if($cart){
             return redirect('/shop');
         }
    }
    public function addToCartFromWishlist($id)
    {
        $wishlist = new wishlist;
        $cart = new cart;
        $wishlistData = $wishlist::where('product_id',$id)->get()->first();
        $user_email = Session()->get('user_email');
        
       
        
        $cart->user_email	    = $user_email;
        $cart->product_name     = $wishlistData->product_name;
        $cart->product_price    = $wishlistData->product_price;
        $cart->product_quantity = 1;
        $cart->product_image    = $wishlistData->product_image;
        $cart->product_id       = $wishlistData->product_id;

        $cart->save();
        
         if($cart){
           
            $wishlist::where('product_id',$id)->delete();
             return redirect('/cart');
         }
    }
    public function productByCategory($id)
    {
        $product = new product;
        $category = new category;
        $brand = new brand;

        $productList = $product::join('categories','categories.id',"=",'products.category_id')
                                ->where('category_id',$id)
                                ->get(['products.*','categories.category_name'])
                                ->all();
                            

        $categoryList = $category::all();
        $brandList = $brand::all();

        return view('user.productByCategory',['productList'=>$productList,'categoryList'=>$categoryList,'brandList'=>$brandList]);                    
    }
    public function productBySubCategory($id)
    {   
        $product = new product;
        $category = new category;
        $brand   = new brand;

        $productList = $product::join('sub_categories','sub_categories.id',"=",'products.sub_category_id')
                                ->where('sub_category_id',$id)
                                ->get(['products.*','sub_categories.sub_category_name'])
                                ->all();
                            

        $categoryList = $category::all();
        $brandList = $brand::all();

        return view('user.productBySubCategory',['productList'=>$productList,'categoryList'=>$categoryList,'brandList'=>$brandList]);    
    }
    public function productByBrand($id)
    {
        $product = new product;
        $category = new category;
        $brand   = new brand;

        $productList = $product::join('brands','brands.id',"=",'products.brand_id')
                                ->where('brand_id',$id)
                                ->get(['products.*','brands.brand_name'])
                                ->all();
                            

        $categoryList = $category::all();
        $brandList = $brand::all();

        return view('user.productBySubCategory',['productList'=>$productList,'categoryList'=>$categoryList,'brandList'=>$brandList]);    
    }
}
