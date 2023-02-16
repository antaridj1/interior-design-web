<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'deleted_at'
    ];

    protected $dates = ['deleted_at'];

    public function sarans()
    {
        return $this->hasMany(Saran::class, 'saran_id');
    }

    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'user_id');
    }

    public function laporans_ditangani()
    {
        return $this->hasMany(Laporan::class, 'user_master_id');
    }

    public function jumlah_laporan_ditangani()
    {
        return Order::where('user_master_id',$this->id)->where('status','selesai')->get()->count();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
