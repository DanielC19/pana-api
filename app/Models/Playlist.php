<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    static $rules = [
        'name' => 'string|required|max:255',
        'link' => 'string|required|max:255'
    ];

    protected $fillable = [
        'user_id',
        'name',
        'link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
