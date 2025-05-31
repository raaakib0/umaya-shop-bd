<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
    'customer_name',
    'customer_address',
    'customer_phone',
    'product_name',
    'amount',
    'status'
];

}
