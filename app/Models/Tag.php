<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [

        'tag_name', 'tag_body', 'tag_field', 'default_replace', 'promp_text',
    ];
}
