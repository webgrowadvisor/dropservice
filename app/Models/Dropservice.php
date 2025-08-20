<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dropservice extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'status',
        'api_key',
        'gst',
        'address',
        'logo',
        'gst_image',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

     protected $hidden = [
        'password', 'remember_token',
    ];

}
