<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code_name',
        'base64',
        'mime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_code_name', 'code_name');
    }
}
