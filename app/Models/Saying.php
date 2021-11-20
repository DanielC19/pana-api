<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saying extends Model
{
    use HasFactory;

    static $rules = [
        'saying' => 'string|required|max:255|unique',
    ];

    protected $fillable = [
        'saying'
    ];
}
