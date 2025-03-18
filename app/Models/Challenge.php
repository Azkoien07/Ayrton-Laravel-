<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
        'state',
        'difficulty',
        'points',
    ];

    // Relación muchos a muchos con la tabla tasks
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'challenge_task', 'challenge_id', 'task_id');
    }

    // Relación muchos a muchos con la tabla rankings
    public function rankings()
    {
        return $this->belongsToMany(Ranking::class, 'challenge_ranking', 'challenge_id', 'ranking_id');
    }
}
