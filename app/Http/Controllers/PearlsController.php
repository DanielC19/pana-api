<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use App\Models\Pearls;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PearlsController extends Controller
{
    public function create(Request $request)
    {
        // Valida la información que viene del request
        try {
            $request->validate(Pearls::$rules);
        } catch (\Exception $e) {
            return 'Ingresa toda la información de la perla correctamente';
        }
        // Si está correcta, la agrega en la base de datos
        try {
            Pearls::create($request->all());
            return 'Haz inmortalizado una de las Perlas de la Sabiduría :D';
        } catch (\Exception $e) {
            return 'Hubo un problema, inténtalo más tarde :(';
        }
    }

    public function all()
    {
        // Toma todas las perlas y envía su información
        $pearls = Pearls::all();
        return response()->json($pearls);
    }

    public function daily()
    {
        // Busca todos los dailies creados en array
        $dailies = Daily::all()->toArray();
        
        // Se define la función callback para el array map
        $callback = function($daily) {
            // Valida si es daily es de hoy
            $date = Carbon::createFromDate($daily['created_at']);
            if ($date->isToday()) {                
                return $daily;
            }
        };
        // Mapea los dailies con la función callback
        $pearl = array_map($callback, $dailies);

        // Si no hay perla para ese día, crea una aleatoria
        if (count($pearl) == 0) {
            $random_pearl = Pearls::all()->random();
            Daily::create(['pearl_id' => $random_pearl->id]);
            $daily_pearl = $random_pearl;
        }
        // Si encuentra una perla para ese día, busca toda su información
        if (count($pearl) > 0) {
            $daily_pearl = Pearls::find($pearl[0]['pearl_id']);
        }

        return response()->json($daily_pearl);
    }
}
