<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompoundAmenity extends Model
{
    use HasFactory;
    protected $fillable = [
        'compound_id',
        'amenity_id'
    ];
}
