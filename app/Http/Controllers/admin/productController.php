<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\product;
use App\Models\admin\category;
use App\Models\brand;
use App\Models\color;
use App\Models\size;
use App\Models\subCategory;


class productController extends Controller
{
    public  function product()
    {
        $product = new product;
        $category = new category;
        $brand = new brand;
        $color = new color;
        $size  = new size;
        $subCategory = new subCategory;

        $productList  = $product::all();
        $categoryList = $category::all();
        $brandList    = $brand::all();
        $colorList    = $color::all();
        $sizeList     = $size::all();
        $subCategoryList = $subCategory::all();

        return view('admin.addProduct',['productList'=>$productList,'categoryList'=>$categoryList,'brandList'=>$brandList,'colorList'=>$colorList,'sizeList'=>$sizeList,'subCategoryList'=>$subCategoryList]);
    }
    public function addProduct(Request $req)
    {
        $product = new product;

        $color = $req->input('product_color');
        $product_color = implode(",",$color);
        $size  = $req->input('product_size');
        $product_size = implode(",",$size);

        $product->product_name = $req->input('product_name');
        $product->product_reguler_price = $req->input('product_reguler_price');
        $product->product_sale_price = $req->input('product_sale_price');
        $product->product_quantity = $req->input('product_quantity');
        $product->product_short_description = $req->input('product_short_description');
        $product->product_logn_description = $req->input('product_long_description');
        $product->product_image = $req->file('product_image')->store('uploads');
        $product->category_id =$req->input('category_id');
        $product->sub_category_id = $req->input('sub_category_id');
        $product->brand_id = $req->input('brand_id');
        $product->product_color = json_encode($product_color);
        $product->product_size = json_encode($product_size);
        $product->featured = $req->input('featured');

        $images=array();

        if($files = $req->file('product_images')){
            $i=0;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $fileNameExtract=explode('.',$name);
                $fileName=$fileNameExtract[0];
                $fileName.=time();
                $fileName.=$i;
                $fileName.='.';
                $fileName.=$fileNameExtract[1];

                $file->move('image',$fileName);
                $images[]=$fileName;
                $i++;
            }
            $product['product_images'] = implode("|",$images);

        }
    
        $result = $product->save();

        if($result){
            return redirect()->back()->with('message','Product Inserted Susseccfully');
        }
        else{
            return redirect()->back()->with('message','Somthing is wrong');
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
                ->get(['products.*','categories.id as catId','categories.category_name','brands.id as brandId','brands.brand_name']);

        return view('admin.updateProduct',['productData' => $data,'productList' => $productList,'categoryList'=>$categoryList,'brandList'=>$brandList]);

    }
    public function updatedSelectedProduct(Request $req,$id)
    {
        $products = new product;
        $product = $products::find($id);

        $product->product_name = $req->input('product_name');
        $product->product_reguler_price = $req->input('product_reguler_price');
        $product->product_sale_price = $req->input('product_sale_price');
        $product->product_quantity = $req->input('product_quantity');
        $product->product_attribute = $req->input('product_attribute');
        $product->product_short_description = $req->input('product_short_description');
        $product->product_logn_description = $req->input('product_long_description');
        if($req->file('product_image'))
        {
            $product->product_image = $req->file('product_image')->store('uploads');
        }else{
            $product->product_image = $product->product_image;
        }
        $product->category_id =$req->input('category_id');
        $product->brand_id = $req->input('brand_id');
        $product->featured = $req->input('featured');

        $images=array();

        if($files = $req->file('product_images')){
            $i=0;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $fileNameExtract=explode('.',$name);
                $fileName=$fileNameExtract[0];
                $fileName.=time();
                $fileName.=$i;
                $fileName.='.';
                $fileName.=$fileNameExtract[1];

                $file->move('image',$fileName);
                $images[]=$fileName;
                $i++;
            }
            $product['product_images'] = implode("|",$images);

        }
    


        $result = $product->update();
        
        if($result)
        {
            return redirect('/product');
        }
    }
    public function imageGalley()
    {
        $product = new product;
        $productList  = $product::all();
        
        return view('admin.productImages',['productList'=>$productList]);
    }
    public function updateProductImages($id)
    {
        $product = new product;
        $selected_product = $product::find($id);

        $productList  = $product::all();

        return view('admin.updateProductImages',['productList'=>$productList,'selectProduct'=>$selected_product]);
    }
    public function updatSelectedProductImages($id)
    {
        $products = new product;
        $product = $products::find($id);

        $product->product_name = $req->input('product_name');
        $product->product_reguler_price = $req->input('product_reguler_price');
        $product->product_sale_price = $req->input('product_sale_price');
        $product->product_quantity = $req->input('product_quantity');
        $product->product_attribute = $req->input('product_attribute');
        $product->product_short_description = $req->input('product_short_description');
        $product->product_logn_description = $req->input('product_long_description');
        if($req->file('product_image'))
        {
            $product->product_image = $req->file('product_image')->store('uploads');
        }else{
            $product->product_image = $product->product_image;
        }
        $product->category_id =$req->input('category_id');
        $product->brand_id = $req->input('brand_id');
        $product->featured = $req->input('featured');

        $result = $product->update();
        
        if($result)
        {
            return redirect('/product');
        }

    }
}
