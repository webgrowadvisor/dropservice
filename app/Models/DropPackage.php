<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropPackage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'duration_days', 'commission', 'features', 'status'];

    protected $casts = [
        'features' => 'array',
    ];

}
