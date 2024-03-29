<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'mimetype',
        'size',
        'path'
    ];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}
