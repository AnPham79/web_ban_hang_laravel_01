<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'brand_id',
        'short_description',
        'stock_status',
        'SKU'
    ];

    public static function getEmployee() { 
        $records = DB::table('products')->select('id', 'name_product', 'img_product', 'price_product', 'quantity_product', 'description_product', 'category_id', 'brand_id')->get()->toArray();
        return $records;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setDateCreated()
    {
        return $this->created_at->Format('d-m-Y');
    }
}
