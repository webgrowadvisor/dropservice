<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'address_line',
        'city',
        'state',
        'pincode',
        'country'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
