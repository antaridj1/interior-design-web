<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function architect()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function getFormattedStartedMonthAttribute()
    {
        return Carbon::parse($this->started_month)->format('M Y');
    }

    public function getStatusStringAttribute()
    {
        if($this->status === 0){
            $status = 'Pending';
        } elseif($this->status === 1){
            $status = 'On Going';
        } else {
            $status = 'Selesai';
        }

        return $status;
    }

    public function getStatusBadgeAttribute()
    {
        if($this->status === 0){
            $badge = 'bg-secondary';
        } elseif($this->status === 1){
            $badge = 'bg-warning';
        } else {
            $badge = 'success';
        }

        return $badge;
    }
}
