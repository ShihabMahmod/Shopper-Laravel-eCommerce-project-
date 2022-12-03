<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\category;
use Session;

class categoryController extends Controller
{
    public function category()
    {
        

        $category = new category;
        $result = $category->all();
       
        
        return view('admin.addCategory',['category'=>$result]);
    }
    public function addCategory(Request $req)
    {
        $category = new category;

        $category->category_name = $req->input('category_name');
        $category->category_status = 1; 
        $result = $category->save();
        
        if($result)
        {
            $categoryList = $category->all();
            return view('admin.addCategory',['category'=> $categoryList]);
        }
    }
    public function deleteCategory($id)
    {
        $category = new category;
        $result = $category->where('id',$id)->delete();
        $categoryList = $category->all();
        return view('admin.addCategory',['category'=>$categoryList]);
    }
    public function activeCategory($id)
    {
        $activeCategory = category::where('id',$id)->update(['category_status'=>1]);
        return redirect('/category');
    }
}
