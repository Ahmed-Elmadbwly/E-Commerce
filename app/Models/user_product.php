<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_product extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'user_id',
        'quantity',
        'check_in'
    ];
}
