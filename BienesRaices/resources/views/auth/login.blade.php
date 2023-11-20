@extends('layouts.app')
@section('container')
<main class="contenedor">
    <h2>Login</h2>

    <form action="{{route('Login')}}" method="post" class="formulario">
        @csrf
        @if (session('mensaje'))
            <div class="alerta">
                {{session('mensaje')}}
            </div>
        @endif
        <fieldset>
            <legend>Iniciar Sesión</legend>

            <label for="username">Usuario:</label>
            <input type="text" name="username" id="username" placeholder="Ingresa tu nombre de usuario">
            @error('username')
                <div class="alerta">
                    {{$message}}
                </div>
            @enderror

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
            @error('password')
                <div class="alerta">
                    {{$message}}
                </div>
            @enderror

            <input type="submit" value="Iniciar sesión">
            <a href="{{route('IndexRegistro')}}">¿No tienes cuenta?, crea una</a>
        </fieldset>
    </form>
</main>
    
@endsection