{{-- @extends('layouts.app') --}}
{{-- @extends('layouts.app_index') --}}
@extends('layouts.app_login')
@section('container')
<main class="contenedor" style="align-items: center">
    <div class="center_fondo">
        <div class="fondo">
            <div class="contendor-form login">
                <h2>Login</h2>
                <form action="{{route('Login')}}" method="post">
                    @csrf
                    @if (session('mensaje'))
                        <div class="alerta">
                            {{session('mensaje')}}
                        </div>
                    @endif
                    <div class="contenedor-input">
                        <span class="icono"><i class="fa-solid fa-user"></i></i></span>
                        <input type="text" required>
                        <label for="#">Usuario</label>
                        @error('username')
                            <div class="alerta">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <div class="contenedor-input">
                        <span class="icono"><i class="fa-solid fa-lock"></i></i></span>
                        <input type="password" required>
                        <label for="#">Contraseña</label>
                        @error('password')
                            <div class="alerta">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <button type="submit" class="btn-login">Iniciar Sesion</button>
    
                    <div class="registrar">
                        <p>¿No tienes cuenta? <a href="{{route('IndexRegistro')}}" class="registrar-link">crea una</a></p>
                    </div>
                </form>
            </div>
            
        </div>
    </div>





    {{-- <h2>Login</h2>

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
    </form> --}}
</main>
    
@endsection