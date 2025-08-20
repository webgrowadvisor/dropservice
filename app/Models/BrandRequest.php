<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandRequest extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id', 'brand_name', 'gst_certificate', 'brand_certificate', 'status'];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

}
