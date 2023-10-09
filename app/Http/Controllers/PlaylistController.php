<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function user($discord_user_id)
    {
        $user = User::where('discord_user_id', $discord_user_id)->first();

        if ($user !== null) {
            $user->playlists;
            return response()->json($user);
        }
        return 'Hubo un problema, inténtalo más tarde :(';
    }

    public function all()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->playlists;
        }

        return response()->json($users);
    }

    public function create(Request $request)
    {
        try {
            request()->validate(Playlist::$rules);
        } catch (\Exception $e) {
            return 'Ingresa nombre y link válidos, inválido';
        }

        try {
            $user = User::where('discord_user_id', $request->discord_user_id)->first();
            Playlist::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'link' => $request->link
            ]);
            return 'Has agregado una playlist de cule temazos';
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }

    public function delete(Request $request)
    {
        try {
            $user = User::where('discord_user_id', $request->discord_user_id)->first();
            $playlist = Playlist::find($request->playlist);
            if ($playlist->user_id == $user->id) {
                $playlist->delete();
                return 'Has borrado una playlist, mínimo era guaracha';
            } else {
                return 'Esa playlist no es tuya amiguito';
            }
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }
}