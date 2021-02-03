<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'text', 'category', 'topics', 'author', 'saved_from',
    ];
}
