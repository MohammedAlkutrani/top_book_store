<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    protected $fillable = [
        'title',
        'publish_year',
        'price',
        'isbn',
        'category_id',
    ];
}
