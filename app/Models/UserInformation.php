<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'sex',
        'birthday',
        'description',
        'phone',
        'country',
        'city',
        'timezone',
        'is_send_notification',
        'image'
    ];
}
