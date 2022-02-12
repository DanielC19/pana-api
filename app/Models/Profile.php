<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role',
        'wanted',
        'birthday',
        'icfes',
        'memorable-act',
        'reprehesible-act',
        'group-entry'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
