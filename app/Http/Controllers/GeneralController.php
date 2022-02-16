<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(Request $request)
    {
        try {
            request()->validate(User::$rules); 

            $user = User::create($request->all());
            Profile::create(['user_id' => $user->id]);
            
            return '¡Bienvenido al Bot de la Panadería! Espero sacarte alguna sonrisa :D';
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }
}
