<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationAttribute extends Model
{
    use HasFactory;

     protected $fillable = ['group_id', 'name', 'field_type', 'default_value'];

    public function group()
    {
        return $this->belongsTo(SpecificationGroup::class, 'group_id');
    }
    
}
