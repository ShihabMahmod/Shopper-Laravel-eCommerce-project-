<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subCategory;
use App\Models\admin\category;

class subCategoryController extends Controller
{
    public function subCategory()
    {
        $sub_category = new subCategory;
        $subCategoryList = $sub_category
                         ->join('categories','categories.id', "=" ,'sub_categories.category_id')
                         ->get();

        $category = new category;
        $categoryList = $category::all();
                    

        return view('admin.subCategory',['subCategoryList'=>$subCategoryList,'categoryList'=>$categoryList]);
    }
    public function addSubCategory(Request $req)
    {
        $sub_category = new subCategory;
        
        $sub_category->sub_category_name = $req->input('sub_category_name');
        $sub_category->category_id = $req->input('category_id');
        $sub_category->sub_category_status = 1;

        $result = $sub_category->save();

        if($result){
            return redirect('/sub-category');
        }
    }
}
