<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WritingChild extends Model
{
    use HasFactory;

    protected $fillable = [
        'writing_id', 'writing_name', 'writing_text',
    ];
}
