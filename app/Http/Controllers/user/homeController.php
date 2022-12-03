<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\product;
use App\Models\user\cart;
use App\Models\comment;
use App\Models\user\customer;


class homeController extends Controller
{
    public function home()
    {
        $product = new product;
        $products = $product::join('categories','categories.id', "=" , 'products.category_id')
                ->join('brands','brands.id', "=" , 'products.brand_id')
                ->get('products.*','categories.category_name','brands.brand_name');

                $mobileTabs = $product::join('categories','categories.id', "=" , 'products.category_id')
                ->join('brands','brands.id', "=" , 'products.brand_id')
                ->where('category_name','Mobile')
                ->get(['products.*','categories.category_name','brands.brand_name']);

                $laptopTabs = $product::join('categories','categories.id', "=" , 'products.category_id')
                ->join('brands','brands.id', "=" , 'products.brand_id')
                ->where('category_name','Laptop')
                ->get(['products.*','categories.category_name','brands.brand_name']);

                $watchTabs = $product::join('categories','categories.id', "=" , 'products.category_id')
                ->join('brands','brands.id', "=" , 'products.brand_id')
                ->where('category_name','Watch')
                ->get(['products.*','categories.category_name','brands.brand_name']);

                $cameraTabs = $product::join('categories','categories.id', "=" , 'products.category_id')
                ->join('brands','brands.id', "=" , 'products.brand_id')
                ->where('category_name','Camera')
                ->get(['products.*','categories.category_name','brands.brand_name']);

       
        return view('user.home',['products'=>$products,'mobileTabs'=>$mobileTabs,'laptopTabs'=>$laptopTabs,'watchTabs'=>$watchTabs,'cameraTabs'=>$cameraTabs]);
        
    }

    public function productDetails($id)
    {
        $product = new product;
        $product->where('id',$id)->increment('views');
        $productDetails = $product::join('categories','categories.id', "=" , 'products.category_id')
                ->join('brands','brands.id', "=" , 'products.brand_id')
                ->where('products.id',$id)
                ->get(['products.*','categories.category_name','brands.brand_name'])
                ->first();
        
        $reletedCategoryID = $productDetails->category_id;        

        $releted_category = $product::join('categories','categories.id', "=" , 'products.category_id')
                                    ->where('category_id',$reletedCategoryID)
                                    ->get(['products.*','categories.category_name'])
                                    ->all();
        $review = comment::join('customers','customers.id',"=",'comments.user_id')
                          ->join('products','products.id',"=",'comments.product_id')
                          ->where('product_id',$id)
                          ->get(['comments.*','customers.id as user_id','customers.name','customers.image'])->all();   
        $noReview =  comment::where('product_id',$id)->count();                                         
       
        $rating = comment::where('product_id',$id)->sum('rating');

        if($rating > 0){
            $agv_rating = ceil($rating/$noReview);
        }else{
            $agv_rating = 0;
        }
        $populer_product = $product->orderBy('views','DESC')->take(4)->get();

        return view('user.productDetails',['productDetails'=>$productDetails,'releted_category'=>$releted_category,'review'=>$review,'noReview'=>$noReview,'agv_rating'=>$agv_rating,'populer_product'=>$populer_product]);
    }
}
