<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;
use App\Rules\MaxWords;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $propiedades=Propiedad::all();
        return view('anuncios.index',['propiedades'=>$propiedades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('anuncios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'resumen' => ['required',new MaxWords(15)],
            'precio' => 'required|numeric|min:0|regex:/^\d+(\.\d{2})?$/',
            'noToilet' => 'required|integer|min:0',
            'noCocheras' => 'required|integer|min:0',
            'noHabitaciones' => 'required|integer|min:0',
            'imagen' => 'required|image|dimensions:min_width=385,min_height=288.5|mimes:jpg,png,jpeg'
        ]);
        
        $nombreOriginal=time().$request->file('imagen')->getClientOriginalName();
        Propiedad::create([
            'nombrePropiedad'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'noToilet'=>$request->noToilet,
            'noCocheras'=>$request->noCocheras,
            'noHabitaciones'=>$request->noHabitaciones,
            'imagen'=>$nombreOriginal,
            'resumen'=>$request->resumen
        ]);
        $request->file('imagen')->storeAs('public/propiedades',$nombreOriginal);
        return to_route('AnunciosIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $propiedad=Propiedad::find($id);
        return view('anuncios.show',['propiedad'=>$propiedad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
