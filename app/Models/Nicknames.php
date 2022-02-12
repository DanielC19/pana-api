<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nicknames extends Model
{
    use HasFactory;

    static $rules = [
        'nickname' => 'string|required|max:255',
    ];

    protected $fillable = [
        'user_id',
        'nickname'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
