<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_id',
        'title',
        'type',
        'location',
        'isRenovation',
        'needs',
        'room_size',
        'interior_style_id',
        'budget',
        'started_month',
        'detail',
        'progress',
        'results',
        'dealed_fee',
        'status',
    ];
}
