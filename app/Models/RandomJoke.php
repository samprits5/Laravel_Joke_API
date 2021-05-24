<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomJoke extends Model
{
    use HasFactory;

    protected $fillable = [
        'joke'
    ];

}
