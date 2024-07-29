<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compound extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_image',
        'en_name',
        'ar_name',
        'location_on_map',
        'home_background',
        'master_plan_image',
        'ar_overview',
        'en_overview',
        'overview_background',
        'status',
        'area_from',
        'area_to',
        'ar_location',
        'en_location',
        'location_id',
        'type',
        'installments',
        'payment_plans',
        'start_price',
        'max_price',
        'payment_years'
    ];
}
