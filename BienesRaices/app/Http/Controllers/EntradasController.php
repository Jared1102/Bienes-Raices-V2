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
        // $entradas = Entradas::with('user:id,name')->paginate(5);
        // return view('blog.index',['entradas'=>$entradas]);
        //$entradas=Entradas::all();
        $entradas=Entradas::with('user:id,username')->get();
        
        return view('blog.index',['entradas'=>$entradas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blog.create');
        // $users = User::all();
        // return view('blog.create',['users'=> $users]);
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
            'resumen' => 'required|min:15'
        ]);
        $entradas=$request->file('imagen')->getClientOriginalName();

        Entradas::create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'imagen'=>time().$request->file('imagen')->getClientOriginalName(),
            'user_id' => auth()->user()->id,
            'resumen'=>$request->resumen
        ]);
        $request->file('imagen')->storeAs('public/blog',time().$entradas);
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
        $entradas = Entradas::find($id);
        return view('blog.edit',['entrada'=> $entradas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required|min:15',
            // 'imagen' => 'required|image|mimes:jpg,png,jpeg',
            'resumen' => 'required|min:15'
        ]);
        if(empty($request->file('imagen')))
        {
            $entradas = Entradas::find($id);
            if ($entradas) {
                $entradas->titulo = $request->input('titulo');
                $entradas->descripcion = $request->input('descripcion');
                $entradas->resumen = $request->input('resumen');
                $entradas->user_id=auth()->user()->id;
                // $entradas->save();
            }
        }else{
            $request->validate([
                'imagen'=> 'required|image|dimensions:min_width=,min_height=288.5|mimes:jpg,png,jpeg'
            ]);
            $entradas = Entradas::find($id);
            if ($entradas) {
                $entradas->titulo = $request->input('titulo');
                $entradas->descripcion = $request->input('descripcion');
                $entradas->resumen = $request->input('resumen');
                $entradas->user_id=auth()->user()->id;
                //borrar archivo
                Storage::delete('public/blog/'.$entradas->imagen);
                //obtener nombre del archivo
                $nombreOriginal=time().$request->file('imagen')->getClientOriginalName();
                //guardar nuevo nombre
                $entradas->imagen=$nombreOriginal;
                //guardar archivo
                $request->file('imagen')->storeAs('public/blog',$nombreOriginal);
            }
        }
        $entradas->save();
        
        // session()->flash('status','Se actualizo la entrada' . $request->titulo);
        return to_route('indexblog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entradas = Entradas::find($id);
        if ($entradas) {
            $entradas->delete();
        }
        session()->flash('status','Se elimino el producto' . $entradas->titulo);
        return to_route('indexblog');
    }
}
