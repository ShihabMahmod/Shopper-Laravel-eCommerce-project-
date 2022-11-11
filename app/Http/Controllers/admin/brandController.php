<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;

class brandController extends Controller
{
    public function brand()
    {
        return  view('admin.addBrand');
    }
    public function addBrand(Request $req)
    {
        $brabd = new brand;

        $brand_name = $req->brand_name;
        $brand_status = 1;

        $resul = $brabd->save();

        if($resul){
            return redirect('/add-brand');
        }

    }
}
