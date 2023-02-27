<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'employee';
    
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

}
