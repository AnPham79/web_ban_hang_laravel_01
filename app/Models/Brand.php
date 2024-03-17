<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public $fillable = [
        'brand_name'
    ];

    public function setCreatedTime() {
        return $this->created_at->format('d/m/Y');
    }

    public function setUpdatedTime() {
        return $this->updated_at->format('d/m/Y');
    }
}
