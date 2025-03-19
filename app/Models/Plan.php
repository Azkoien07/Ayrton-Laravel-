<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'state',
        'duration',
    ];

    // Relación uno a muchos con la tabla users
    public function users()
    {
        return $this->hasMany(User::class, 'plan_id');
    }
}
