<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopCompound extends Model
{
    use HasFactory;

    protected $fillable = [
        'compound_order',
        'compound_id'
    ];
}
