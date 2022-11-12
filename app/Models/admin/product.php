<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public $timestemps = false;
    protected $primaryKey = "id";

    public function getData()
    {
        return $this->hasMany('App\Models\admin\category','category_id');
    }

    protected $fillable=[
        'product_name',
        'product_category',
        'product_brand',
        'product_reguler_price',
        'product_sale_price',
        'product_quantity',
        'product_short_description',
        'product_long_description',
        'product_attribute',
        'category_id',
        'brand_id',
        'product_status'
    ];
}
