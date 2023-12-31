<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use Illuminate\Http\Request;
use App\Models\Propiedad;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $propiedades=Propiedad::inRandomOrder()->take(3)->get();
        //$propiedades=DB::table('propiedades')->limit(3)->get();
        $entradas=Entradas::with('user:id,username')->inRandomOrder()->take(2)->get();

        return view('index',[
            'propiedades'=>$propiedades,
            'entradas'=>$entradas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
