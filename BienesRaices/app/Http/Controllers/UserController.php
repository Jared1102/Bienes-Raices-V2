<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    //
    public function indexLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($request->only('username','password'))){
            return back()->with('mensaje','Credenciales incorrectas.');
        }
        return redirect()->route('main');
    }

    public function indexRegistro(){
        return view('auth.registro');
    }

    public function Registro(Request $request){
        $request->validate([
            'name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|unique:users|email',
            'password'=>'required|confirmed|min:8'
        ]);

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'rol'=>'Usuario'
        ]);

        auth()->attempt([
            'username'=>$request->username,
            'password'=>$request->password
        ]);

        return redirect()->route('main');
    }
}
