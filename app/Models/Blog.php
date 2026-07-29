<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
     use HasFactory;

    // This allows Laravel to safely insert data into these columns
    protected $fillable = [
        'title',
        'prompt_keywords',
        'content',
    ];
}
