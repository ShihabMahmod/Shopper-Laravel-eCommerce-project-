<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\product;
use App\Models\user\cart;

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
        $productDetails = $product::join('categories','categories.id', "=" , 'products.category_id')
                ->join('brands','brands.id', "=" , 'products.brand_id')
                ->where('products.id',$id)
                ->get(['products.*','categories.category_name','brands.brand_name'])
                ->first();

                

        return view('user.productDetails',['productDetails'=>$productDetails]);
    }
}
