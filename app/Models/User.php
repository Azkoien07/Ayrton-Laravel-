<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    
     protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'role_id',
        'plan_id',
    ];

    // Relación muchos a uno con la tabla roles
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // Relación muchos a uno con la tabla plans
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    // Relación muchos a muchos con la tabla pqrs
    public function pqrs()
    {
        return $this->belongsToMany(Pqr::class, 'user_pqr', 'user_id', 'pqr_id');
    }
    
    // Relación muchos a muchos con la tabla tasks
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'user_task', 'user_id', 'task_id');
    }
    
    // Relación muchos a muchos con la tabla payments
    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'payment_user', 'user_id', 'payment_id');
    }
}
