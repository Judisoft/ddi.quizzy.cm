<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'telephone',
        'amount',
        'transaction_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
