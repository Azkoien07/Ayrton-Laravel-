<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Role extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'access_level',
    ];

    // Relación uno a muchos con la tabla users
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
