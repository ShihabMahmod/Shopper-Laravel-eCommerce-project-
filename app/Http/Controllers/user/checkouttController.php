<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkouttController extends Controller
{
    public function checkout()
    {
        return view('user.checkout');
    }
}
