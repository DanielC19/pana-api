<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'discord_user_id'
    ];
    
    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    public function nicknames()
    {
        return $this->hasMany(Nicknames::class);
    }

    public function games()
    {
        return $this->hasMany(Games::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
