<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\product;
use App\Models\admin\category;
use App\Models\brand;

class productController extends Controller
{
    public  function product()
    {
        $product = new product;
        $productList = $product->all();
        return view('admin.addProduct',['productList'=>$productList]);
    }
}
