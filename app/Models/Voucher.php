<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'voucher_code',
    ];

    // Relación uno a muchos con la tabla payments
    public function payments()
    {
        return $this->hasMany(Payment::class, 'voucher_id');
    }
}
