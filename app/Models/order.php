<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','shipping_id','product_id','product_name','product_quantity','order_price','product_color','product_size','product_image','order_status'];
}
