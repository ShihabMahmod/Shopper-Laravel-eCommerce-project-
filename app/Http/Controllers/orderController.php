<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\user\customer;
use Barryvdh\DomPDF\Facade\Pdf;



class orderController extends Controller
{
    public function order()
    {
        $order = new order;
        $orderList = $order::all();
        return view('admin.order',['orderList'=>$orderList]);
    }
    public function updateOrderStatus($id)
    {
        $order = new order;
        $order = $order::where('id',$id)->update(['order_status'=>1]);
        if($order)
        {
            return redirect('/order');
        }
    }
    public function orderDetails($user_id)
    {
        $customer = customer::find($user_id);
        $orders = order::where('user_id',$user_id)->get()->all();

        return view('admin.orderDetails',['customer'=>$customer,'orders'=>$orders]);
    }
    public function invoiceGenerate($user_id)
    {
        $customer = customer::find($user_id);
        $orders = order::where('user_id',$user_id)
                        ->where('order_status',0)
                        ->get()->all();
        $order_amount = order::where('user_id',$user_id)
                        ->where('order_status',0)->get()->sum('order_price');                
        $data = [
            'orders' => $orders,
            'user'=>$customer,
            'order_amount'=> $order_amount
        ];

        $pdf = Pdf::loadView('admin.invoice', $data);
        if($pdf)
        {
            $orders = order::where('user_id',$user_id)
            ->update(['order_status'=>1]);
            return $pdf->download('invoice.pdf');
        }
    }
}
