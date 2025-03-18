<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'purchase_amount',
        'payment_method',
        'payment_date',
        'voucher_id',
    ];

    // Relación muchos a muchos con la tabla users
    public function users()
    {
        return $this->belongsToMany(User::class, 'payment_user', 'payment_id', 'user_id');
    }

     // Relación muchos a uno con la tabla vouchers
     public function voucher()
     {
         return $this->belongsTo(Voucher::class, 'voucher_id');
     }
}
