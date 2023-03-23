<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'file_id'
    ];

    protected $table = 'feedbacks';

    public function file()
    {
        return $this->hasOne(File::class);
    }
}
