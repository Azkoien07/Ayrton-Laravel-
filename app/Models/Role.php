<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
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
