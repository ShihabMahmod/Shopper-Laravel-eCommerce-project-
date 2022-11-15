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
        $category = new category;
        $brand = new brand;

        $productList  = $product::all();
        $categoryList = $category::all();
        $brandList    = $brand::all();

        return view('admin.addProduct',['productList'=>$productList,'categoryList'=>$categoryList,'brandList'=>$brandList]);
    }
    public function addProduct(Request $req)
    {
        $product = new product;

        $product->product_name = $req->input('product_name');
        $product->product_reguler_price = $req->input('product_reguler_price');
        $product->product_sale_price = $req->input('product_sale_price');
        $product->product_quantity = $req->input('product_quantity');
        $product->product_attribute = $req->input('product_attribute');
        $product->product_short_description = $req->input('product_short_description');
        $product->product_logn_description = $req->input('product_long_description');
        $product->product_image = $req->file('product_image')->store('uploads');
        $product->category_id =$req->input('category_id');
        $product->brand_id = $req->input('brand_id');
        $product->featured = $req->input('featured');

        $result = $product->save();

        if($result){
            return redirect('/product');
        }
        else{
            return redirect('/product');
        }
    }


    public function updateProduct(Request $req,$id)
    {
        $product = new product;
        $category = new category;
        $brand = new brand;

        $productList = $product::all();
        $categoryList = $category::all();
        $brandList    = $brand::all();

        $data = $product::join('categories','categories.id', "=" , 'products.category_id')
                ->join('brands','brands.id', "=" , 'products.brand_id')
                ->where('products.id',$id)
                ->get(['products.*','categories.id','categories.category_name','brands.id','brands.brand_name']);

        return view('admin.updateProduct',['productData' => $data,'productList' => $productList,'categoryList'=>$categoryList,'brandList'=>$brandList]);

    }
    public function updatedProduct(Request $req)
    {
        $products = new product;
        $product = $products::find($req->id);

        $product->product_name = $req->input('product_name');
        $product->product_reguler_price = $req->input('product_reguler_price');
        $product->product_sale_price = $req->input('product_sale_price');
        $product->product_quantity = $req->input('product_quantity');
        $product->product_attribute = $req->input('product_attribute');
        $product->product_short_description = $req->input('product_short_description');
        $product->product_logn_description = $req->input('product_long_description');
        $product->product_image = $req->file('product_image')->store('uploads');
        $product->category_id =$req->input('category_id');
        $product->brand_id = $req->input('brand_id');
        $product->featured = $req->input('featured');

        $result = $product->save();
        
        if($result)
        {
            return redirect('/add-product');
        }
    }
}
