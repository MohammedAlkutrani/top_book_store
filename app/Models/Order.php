<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable = [
        'user_id',
        'payment_method_id',
        'address',
        'total',
        'status',
    ];
}
