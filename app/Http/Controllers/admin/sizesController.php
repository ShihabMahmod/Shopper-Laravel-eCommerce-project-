<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\size;

class sizesController extends Controller
{
    public function sizes()
    {
        $size = new size;
        $sizeList = $size::all();

        return view('admin.addSize',['sizeList'=>$sizeList]);
    }
    public function addSize(Request $req)
    {
        $size = new size;

        $size->size_name = $req->input('size_name');
        $size->size_status = 1;
        $result = $size->save();

        if($result)
        {
            return redirect('/sizes');
        }
    }
}
