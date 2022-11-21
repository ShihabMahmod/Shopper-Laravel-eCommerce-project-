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
    public function userLogdin(Request $req)
    {
        $user = new customer;

        $email    = $req->email;
        $password = $req->password;

        $user_data = $user::where('email',$email)->get()->first();

        if($user_data && $user_data->password === $password)
        {
            Session()->put('user_name',$req->name);
                Session()->put('user_email',$req->email);
                Session()->put('user_password',$req->password);
                return redirect('/');
        }
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
                Session()->put('user_name',$req->name);
                Session()->put('user_email',$req->email);
                Session()->put('user_password',$req->password);
                return redirect('/');
            }
        }
    }
    public function userLogOut()
    {
        Session::flush();
        return redirect('/');
    }
}
