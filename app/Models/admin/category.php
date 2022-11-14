<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\product;

class category extends Model
{
    use HasFactory;

    public function getData()
    {
        return $this->hasMany(product::class,'category_id','id');
    }
   
    public $timestemps = false;

    protected $fillable=[
        'category_name',
        'category_status'
    ];
}
