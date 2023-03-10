<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use SoftDeletes;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'employee';
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'isAdmin',
        'status',
        'deleted_at'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'employee_id');
    }

    public function jumlah_laporan_ditangani()
    {
        return Order::where('employee_id',$this->id)->where('status',2)->get()->count();
    }

    public function getArchitectStatusAttribute()
    {
        return $this->status == false ? 'Available' : 'Not Available';
    }

}
