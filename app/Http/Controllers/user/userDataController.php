<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user\customer; 
use Session;

class userDataController extends Controller
{
    public function login()
    {
        return view('user.login');
    }
    public function register()
    {
        return view('user.register');
    }
    public function createAccount(Request $req)
    {
        $user = new customer;

        $password = $req->input('password');
        $confirm_password = $req->input('confirm_password');

        if($password === $confirm_password){
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $user->password = $password;
            $result = $user->save();
            if($result){
                $req->session()->put('user_name',$name);
                $req->session()->put('user_email',$email);
                $req->session()->put('user_password',$password);
                return redirect('/');
            }
        }
    }
}
