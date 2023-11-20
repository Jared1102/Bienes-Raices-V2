@extends('layouts.app')
@section('container')
    <main class="contenedor">
        <h2>Registro</h2>
        <form action="{{route('Registro')}}" method="post" class="formulario">
            @csrf
            <fieldset>
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" placeholder="Introduce tu nombre">
                @error('name')
                    <div class="alerta">
                        {{ $message }}
                    </div>
                @enderror

                <label for="username">Nombre de usuario:</label>
                <input type="text" name="username" id="username" placeholder="Introduce un nombre para la cuenta">
                @error('username')
                    <div class="alerta">
                        {{ $message }}
                    </div>
                @enderror

                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Introduce un correo electronico">
                @error('email')
                    <div class="alerta">
                        {{ $message }}
                    </div>
                @enderror

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">

                <label for="pasword_confirmation">Repetir contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
                @error('password')
                    <div class="alerta">
                        {{ $message }}
                    </div>
                @enderror

                <div class="centrar-botones">
                    <input type="submit" value="Registrarse" class="boton-verde alinear-izquierda">
                    <a href="{{route('main')}}" class="boton-amarillo">Cancelar</a>
                </div>
            </fieldset>
        </form>
    </main>
@endsection