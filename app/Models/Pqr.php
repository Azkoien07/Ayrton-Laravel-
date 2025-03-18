<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pqr extends Model
{
    protected $fillable = [
        'type_pqr',
        'title',
        'description',
        'argument',
        'answer',
        'status',
    ];

    // Relación muchos a muchos con la tabla users (a través de la tabla intermedia user_pqr)
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_pqr', 'pqr_id', 'user_id');
    }
}
