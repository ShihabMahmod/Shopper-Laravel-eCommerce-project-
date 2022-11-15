<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\category;
use App\Models\brand;

class product extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    public function getCategory()
    {
        return $this->hasOne(category::class,'id','category_id');
      
    }
    public function getbrand()
    {
        return $this->hasOne(brand::class,'id','brand_id');
      
    }

    protected $fillable=[
        'product_name',
        'product_reguler_price',
        'product_quantity',
        
    ];
}
