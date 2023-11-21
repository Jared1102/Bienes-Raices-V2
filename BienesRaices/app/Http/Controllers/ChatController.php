<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Propiedad;
use App\Models\Respuestas;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class ChatController extends Controller
{
    //
    public function obtenerRespuesta($texto)
    {

        $respuesta=Respuestas::with('pregunta')->whereHas(
            'pregunta', function ($query) use ($texto){
                $query->where('pregunta','LIKE',"%$texto%");
            }
        )->get()->random();

        return response()->json($respuesta);
    }
}
