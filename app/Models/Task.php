<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'state',
        'description',
        'priority',
        'type',
        'reminder',
        'f_creation',
        'f_expiration',
    ];

    // Relación muchos a muchos con la tabla users (a través de la tabla intermedia user_task)
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_task', 'task_id', 'user_id');
    }

    // Relación muchos a muchos con la tabla challenges
    public function challenges()
    {
        return $this->belongsToMany(Challenge::class, 'challenge_task', 'task_id', 'challenge_id');
    }
}
