<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\color;

class colorController extends Controller
{
    public function color()
    {
        $color = new color;
        $colorList = $color::all();

        return view('admin.addColor',['colorList'=>$colorList]);
    }
    public function addColor(Request $req)
    {
        $color = new color;

        $color->name    = $req->color_name;
        $color->status = 1;
        $result = $color->save();

        if($result)
        {
            return redirect('/color');
        }
    }
}
