<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pearls extends Model
{
    use HasFactory;

    static $rules = [
        'number' => 'integer|required',
        'phrase' => 'string|required|max:255|unique:pearls,phrase',
        'author' => 'string|required|max:255',
        'date' => 'string|required|max:255'
    ];

    protected $fillable = [
        'number',
        'phrase',
        'author',
        'date'
    ];
}
