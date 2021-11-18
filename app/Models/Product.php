<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\ProductDetail;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_name',
        'product_name',
    ];

    public function product_details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
