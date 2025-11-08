<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_number', 'dropshiper_id', 'product_id', 'variant_id',
        'quantity', 'price', 'status', 'payment_method', 'ip_address',
        'mobile', 'address', 'delivery_type',
        'dropshiper_invoice_no', 'dropshiper_sale_price', 'dropshiper_other', 'delivery_date', 'delivery_time',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function dropshipper()
    {
        return $this->belongsTo(Dropservice::class, 'dropshiper_id');
    }

    public function variant() {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

}
