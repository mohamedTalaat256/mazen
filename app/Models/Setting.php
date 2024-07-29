<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_logo',
        'ar_about',
        'en_about',
        'phone',
        'email',
        'ar_address',
        'en_address',
     ];
}
