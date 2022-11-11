<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

   
    public $timestemps = false;

    protected $fillable=[
        'category_name',
        'category_status'
    ];
}
