<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropservicePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'dropservice_id',
        'package_name',
        'price',
        'features',
        'purchased_at',
        'valid_until',
        'commission',
    ];

    protected $casts = [
        'features' => 'array',
        'purchased_at' => 'datetime',
    ];

    public function dropservice()
    {
        return $this->belongsTo(Dropservice::class);
    }
    
}
