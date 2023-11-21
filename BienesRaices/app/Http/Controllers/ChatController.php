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

        $respuestas=Respuestas::with('pregunta')->whereHas(
            'pregunta', function ($query) use ($texto){
                $query->where('pregunta','LIKE',"%$texto%");
            }
        )->get();
        if($respuestas->isEmpty()){
            $respuesta="No tengo respuesta a eso.";
        }else{
            $respuesta=$respuestas->random();
        }

        return response()->json($respuesta);
    }
}
