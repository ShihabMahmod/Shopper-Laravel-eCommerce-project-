<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_data extends Model
{
    use HasFactory;

    protected $table = "admin_data";
    public $timestamps = true;

    protected $fillable  =[
        'name',
        'email',
        'password'
    ];


}
