<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\ProductDetail;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_name',
        'category_id',
        'product_name',
        'wholesale_price',
    ];

    public function product_details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
