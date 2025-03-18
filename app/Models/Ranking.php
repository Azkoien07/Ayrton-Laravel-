<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = [
        'level',
        'position',
    ];

    // Relación muchos a muchos con la tabla challenges
    public function challenges()
    {
        return $this->belongsToMany(Challenge::class, 'challenge_ranking', 'ranking_id', 'challenge_id');
    }
}
