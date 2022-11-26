<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\admin\admin_data;
use Session;

class loginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function admin_login_try(Request $req)
    {

        $admin = new admin_data;

        $this->validate($req,[
            'email'=> 'required|email',
            'password'=>'required|alphaNum|min:6'
        ]);

        $email = $req->input('email');
        $password = $req->input('password') ;
        $result = $admin::where('email',$email)->first();
        if($result && $password === $result->password){
            $req->session()->put('adminEmail',$result->email);
            $req->session()->put('adminName',$result->name);
            return redirect('/dashboard');
        }else{
            return redirect('/admin-login')->with('error','Your login info is not correct');
        }
    }
    public function logo_out()
    {
        Session::flush();
        return redirect('/admin-login');
    }
}
