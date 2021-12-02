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

    protected $primaryKey = 'code_name';
    public $incrementing = FALSE;
    protected $keyType = 'string';

    protected $fillable = [
        'code_name',
        'category_id',
        'product_name',
        'wholesale_price',
    ];

    public function product_details()
    {
        return $this->hasMany(ProductDetail::class, 'product_code_name', 'code_name');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_code_name', 'code_name');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
