<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;

class brandController extends Controller
{
    public function brand()
    {
        $brand = new brand;
        $result = $brand->all();

        return  view('admin.addBrand',['brands'=>$result]);
    }
    public function addBrand(Request $req)
    {
        $brand = new brand;

        $brand->brand_name = $req->input('brand_name');
        $brand->brand_status = 1;
        $result = $brand->save();
        $brandList = $brand->all();

        if($result){
            return view('admin.addBrand',['result'=>'Brand inserted successfully','brands'=>$brandList]);
        }
        else{
            return "Somthing is wrong";
        }
    }
    public function deleteBrand($id)
    {
        $brand = new brand;
        $result = $brand->where('id',$id)->delete();
        if($result)
        {
            return redirect('/brand');
        }
        else{
            return "Error";
        }
    }
}
