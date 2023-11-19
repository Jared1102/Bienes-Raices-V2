<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entradas;//Paa
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;
class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $entradas = Entradas::with('user:id,name')->paginate(5);
        return view('blog.index',['entradas'=>$entradas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('blog.create');
        $users = User::all();
        return view('blog.create',['users'=> $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required|min:15',
            'imagen' => 'required|image|mimes:jpg,png,jpeg',
            'user' => 'required|exists:users,id',
            'resumen' => 'required|min:15'
        ]);
        $entradas=$request->file('imagen')->getClientOriginalName();
        Entradas::create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'imagen'=>$request->file('imagen')->getClientOriginalName(),
            'user_id' => $request->user,
            'resumen'=>$request->resumen
        ]);
        $request->file('imagen')->storeAs('public/blog',$entradas);
        // session()->flash('status','Se guardo el producto' . $request->titulo);
        return to_route('indexblog');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $entrada=Entradas::find($id);
        return view('blog.show',['entrada'=>$entrada]);
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
