<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'dropservice_id',
        'payment_id',
        'amount',
        'currency',
        'status',
        'remark',
    ];

    public function dropservice()
    {
        return $this->belongsTo(Dropservice::class);
    }

}
