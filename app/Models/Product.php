<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'name_product',
        'img_product',
        'price_product',
        'quantity_product',
        'description_product',
        'category_id',
        'brand_id'
    ];
}
