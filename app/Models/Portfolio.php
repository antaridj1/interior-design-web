<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_interior_id',
        'image',
        'description'
    ];

    public function type_interior()
    {
        return $this->belongsTo(TypeInterior::class, 'type_interior_id');
    }
}
