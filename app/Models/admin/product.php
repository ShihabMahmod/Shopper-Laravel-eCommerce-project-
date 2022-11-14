<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\category;
use App\Models\admin\brand;

class product extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    public function getData()
    {
        return $this->hasMany(category::class,'id','category_id');
        //return $this->hasMany(brand::class,'id','brand_id');
    }

    protected $fillable=[
        'product_name',
        'product_reguler_price',
        'product_quantity',
        
    ];
}
