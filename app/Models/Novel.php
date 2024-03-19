<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_count',
        'publish_date',
        'isbn',
        'language',
        'publisher',
        'weight',
        'width',
        'length',
        'price',
    ];

    protected $dates = [
        'publish_date',
    ];
}
