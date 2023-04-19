<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'order_id',
        'session_id',
        'hash'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
