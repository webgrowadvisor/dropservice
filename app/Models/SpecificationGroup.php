<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status'];

    public function attributes()
    {
        return $this->hasMany(SpecificationAttribute::class, 'group_id');
    }
    
}
