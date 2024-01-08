<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'processor',
        'ram',
        'storange_capcity',
        'display_size',
        'graphic_card',
        'color',
        'warranty_period',
        'image',
        'price',
        'quantity',
    ];
}
