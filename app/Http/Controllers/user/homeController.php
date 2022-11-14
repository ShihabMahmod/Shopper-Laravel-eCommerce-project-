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
        $products = $product::all();

        return view('user.home',['products'=>$products]);
    }
}
