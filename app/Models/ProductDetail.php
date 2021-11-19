<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code_name',
        'product_color',
        'product_size',
        'balance_amount',
        'total_amount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_code_name');
    }
}
