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

    public function getTypeColorClass(){
        return match ($this->type) {
            'Petición' => 'bg-blue-200 text-blue-800',
            'Queja' => 'bg-red-200 text-red-800',
            'Reclamo' => 'bg-yellow-200 text-yellow-800',
            'Sugerencia' => 'bg-green-200 text-green-800',
            default => 'bg-gray-200 text-gray-800',
        };

    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_pqr', 'pqr_id', 'user_id');
    }
}
