<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'seller_id',
        'category_id',
        'name',
        'slug',
        'description',
        'base_price',
        'mrp_price',
        'thumbnail', // optional, if you plan to add image
        'status',
        'brand',
        'product_specail',
        'stock',
        'weight',
        'length',
        'width',
        'height',
        'label',
        'product_type',
        'cgst',
        'sgst',
    ];
    
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? asset('storage/' . $this->thumbnail) : null;
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function faqs()
    {
        return $this->hasMany(ProductFaq::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
