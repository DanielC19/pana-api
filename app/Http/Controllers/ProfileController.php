<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Nicknames;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function user($discord_user_id)
    {
        $user = User::all()->where('discord_user_id', $discord_user_id)->random();
        $user->profile;
        $user->nicknames;
        $user->games;

        return response()->json($user);
    }

    public function nickname(Request $request)
    {
        try {
            request()->validate(Nicknames::$rules);
        } catch (\Exception $e) {
            return 'Escribe un apodo válido, inválido';
        }

        try {
            $user = User::all()->where('discord_user_id', $request->discord_user_id)->random();
            Nicknames::create([
                'user_id' => $user->id,
                'nickname' => $request->nickname
            ]);
            return 'Chimba de apodo rey';
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }

    public function role(Request $request)
    {
        try {
            request()->validate(['role' => 'string|required|max:255']);
        } catch (\Exception $e) {
            return 'Escribe un rol válido, inválido';
        }

        try {
            $user = User::all()->where('discord_user_id', $request->discord_user_id)->random();
            $user->profile->update([
                'role' => $request->role
            ]);
            return 'Ese es nuestro '.$request->role;
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }
    
    public function wanted(Request $request)
    {
        try {
            request()->validate(['wanted' => 'string|required|max:255']);
        } catch (\Exception $e) {
            return 'Muy suave, eso no es un crimen';
        }

        try {
            $user = User::all()->where('discord_user_id', $request->discord_user_id)->random();
            $user->profile->update([
                'wanted' => $request->wanted
            ]);
            return 'Uy mano, mucha la lacra... ojalá le hagan el tombo-truco';
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }
    
    public function birth(Request $request)
    {
        try {
            request()->validate(['birth' => 'string|required|max:255']);
        } catch (\Exception $e) {
            return 'Es que no sabe cuando nació o qué ome chimbo';
        }
    
        try {
            $user = User::all()->where('discord_user_id', $request->discord_user_id)->random();
            $user->profile->update([
                'birthday' => $request->birth
            ]);
            return "Se nos creció el pelao' :')";
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }

    public function games(Request $request)
    {
        try {
            request()->validate(Games::$rules);
        } catch (\Exception $e) {
            return 'Todo el día pegado de esa pantalla y no sabe como se llama el juego mijo';
        }

        try {
            $user = User::all()->where('discord_user_id', $request->discord_user_id)->random();
            Games::create([
                'user_id' => $user->id,
                'game' => $request->game
            ]);
            return 'Nananana insano, puro vicio al '.$request->game;
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }
    
    public function icfes(Request $request)
    {
        try {
            request()->validate(['icfes' => 'integer|required']);
        } catch (\Exception $e) {
            return 'Sacó tan poquito que ni lo puedo procesar';
        }
        
        try {
            $user = User::all()->where('discord_user_id', $request->discord_user_id)->random();
            $user->profile->update([
                'icfes' => $request->icfes
            ]);
            return 'Uf nea, le dió raspado para aplicar en la guerrilla';
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }
    
    public function memorable(Request $request)
    {
        try {
            request()->validate(['memorable' => 'string|required|max:255']);
        } catch (\Exception $e) {
            return 'Resuma hermano o ponga algo válido ome inválido';
        }
    
        try {
            $user = User::all()->where('discord_user_id', $request->discord_user_id)->random();
            $user->profile->update([
                'memorable-act' => $request->memorable
            ]);
            return 'Que chino tan pro gvon +respect';
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }
    
    public function reprehesible(Request $request)
    {
        try {
            request()->validate(['reprehesible' => 'string|required|max:255']);
        } catch (\Exception $e) {
            return 'Resuma hermano o ponga algo válido ome inválido';
        }
    
        try {
            $user = User::all()->where('discord_user_id', $request->discord_user_id)->random();
            $user->profile->update([
                'reprehesible-act' => $request->reprehesible
            ]);
            return 'Usted si es mucha la gonorrea perra sarnosa sapa miada nea... sin palabras';
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }
    
    public function entry(Request $request)
    {
        try {
            request()->validate(['entry' => 'string|required|max:255']);
        } catch (\Exception $e) {
            return 'Resuma hermano o ponga algo válido ome inválido';
        }
    
        try {
            $user = User::all()->where('discord_user_id', $request->discord_user_id)->random();
            $user->profile->update([
                'group-entry' => $request->entry
            ]);
            return 'Esperaba algo más épico pero ta bien, de la Panadería nunca saldrás igualmente >:D';
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }

}
