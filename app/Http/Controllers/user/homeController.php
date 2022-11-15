<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\product;

class homeController extends Controller
{
    public function home()
    {
        $product = new product;
        $products = $product::join('categories','categories.id', "=" , 'products.category_id')
                ->join('brands','brands.id', "=" , 'products.brand_id')
                ->get('products.*','categories.category_name','brands.brand_name');

        return view('user.home',['products'=>$products]);
        
    }

    public function productDetails($id)
    {
        $product = new product;
        $productDetails = $product::join('categories','categories.id', "=" , 'products.category_id')
                ->join('brands','brands.id', "=" , 'products.brand_id')
                ->where('products.id',$id)
                ->get(['products.*','categories.category_name','brands.brand_name'])
                ->first();

        return view('user.base.productDetails',['productDetails'=>$productDetails]);
    }
}
