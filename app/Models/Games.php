<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    static $rules = [
        'game' => 'string|required|max:255',
    ];

    protected $fillable = [
        'user_id',
        'game'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
