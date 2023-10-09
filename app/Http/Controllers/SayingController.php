<?php

namespace App\Http\Controllers;

use App\Models\Saying;
use Illuminate\Http\Request;

class SayingController extends Controller
{
    public function create(Request $request) {

        try {

            $request->validate(Saying::$rules);

        } catch (\Exception $e) {
            return response()->json('Ingresa solo el dicho y sin repetir, no es tan difícil :)');
        }
        try {

            Saying::create($request->all());
            return response()->json('Melo, agregaste un pana-dicho');

        } catch (\Exception $e) {
            return response()->json('Hubo un problema, inténtalo más tarde :(');
        }
    }

    public function all() {

        $sayings = Saying::all();
        return response()->json($sayings);

    }

    public function random() {

        $saying = Saying::all()->random();
        return response()->json($saying);

    }
}
