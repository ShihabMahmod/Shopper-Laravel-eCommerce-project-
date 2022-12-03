<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user\cart;
use App\Models\shipping;
use App\Models\user\customer;
use App\Models\order;
use Session;

class checkouttController extends Controller
{
    public function checkout()
    {
        $cart = new cart;

        

        $user_email = Session()->get('user_email');
        $myCart = $cart::where('user_email',$user_email)->get();
        $customerInfo = customer::where('email',$user_email)->get()->first();

        $total = 0;

        foreach($myCart as $cart){
          $total = $total + $cart->product_quantity * $cart->product_price ;
        }

        return view('user.checkout',['total_price'=>$total,'customer'=>$customerInfo]);
    }
    public function shippingInfoSave(Request $req)
    {
        // $shipping = new shipping;
        // $order = new order;

           $user_email = Session()->get('user_email');

           $user_info = customer::where('email',$user_email)->get()->first();
           $user_id = $user_info->id;

        // $shipping->user_id    = $user_id;
        // $shipping->first_name = $req->input('first_name');
        // $shipping->last_name  = $req->input('last_name');
        // $shipping->email      = $req->input('email');
        // $shipping->phone      = $req->input('phone');
        // $shipping->address    = $req->input('address');
        // $shipping->zip        = $req->input('zip');
        // $shipping->city       = $req->input('city');

        // $result = $shipping->save();

        $result =  customer::where('id',$user_id)->update([
            'first_name' => $req->input('first_name'),
            'last_name' => $req->input('last_name'),
            'email' =>$req->input('email'),
            'phone' => $req->input('phone'),
            'address' => $req->input('address'),
            'zip' => $req->input('zip'),
            'city' => $req->input('city')
        ]);



        if($result){
            $myCart = cart::where('user_email',$user_email)->get()->all();
        
            foreach($myCart as $Cart)
            {
                
                order::create([
                'user_id' => $user_id,
                'product_id' => $Cart->product_id,
                'product_name' => $Cart->product_name,
                'product_quantity' => $Cart->product_quantity,
                'product_color' => $Cart->product_color,
                'product_size'  => $Cart->product_size,
                'order_price'   => $Cart->product_price*$Cart->product_quantity,
                'product_image' => $Cart->product_image,
                'order_status' => 0
                ]);
            }

            if($result)
            {
                $delte = cart::where('user_email',$user_email)->delete();

                if($delte){
                    return redirect('/success');
                }
            }
           
        }

    }
    public function success()
    {
        return view('user.success');
    }
}
