<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\category;

class categoryController extends Controller
{
    public function category()
    {
        return view('admin.addCategory');
    }
    public function addCategory(Request $req)
    {
        $category = new category;

        $category_name   = $req->input('category_name');
        $category_status = 1;

        // $validation = $req->validate([
        //     'category_name'=>'requires|max:12|min:3'
        // ]);

        $result = $category->save();

        if($result){
            return redirect('/add-category');
        }
        else{
            return redirect::back()->withErrors($validation);
        }
        
        
    }
}
