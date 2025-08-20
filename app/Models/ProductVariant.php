<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'stock',
        'options',
        'image',
        'webp',
    ];

    public function product()
    {
        return $this->belongsTo(related: Product::class);
    }

    protected $casts = [
        'options' => 'array', //{"color":"Red","size":"L"}
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getWebpUrlAttribute()
    {
        return $this->webp ? asset('storage/' . $this->webp) : null;
    }
 
}
