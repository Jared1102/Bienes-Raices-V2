@extends('layouts.app_login')
@section('container')
    <main class="contenedor" style="align-items: center">
        <div class="center_fondo">
            <div class="fondo-registro">
                <div class="contendor-form login">
                    <h2>Registrarse</h2>
                    <form action="{{route('Registro')}}" method="post">
                        @csrf
                        @if (session('mensaje'))
                            <div class="alerta">
                                {{session('mensaje')}}
                            </div>
                        @endif
                        <div class="contenedor-input">
                            <span class="icono"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="name" id="name" required>
                            <label for="name">Nombre</label>
                            @error('username')
                                <div class="alerta">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="contenedor-input">
                            <span class="icono"><i class="fa-solid fa-clipboard-user"></i></span>
                            <input type="text" name="username" id="username" required>
                            <label for="username">Usuario</label>
                            @error('username')
                                <div class="alerta">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="contenedor-input">
                            <span class="icono"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" id="email" required>
                            <label for="email">Email</label>
                            @error('username')
                                <div class="alerta">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
        
                        <div class="contenedor-input">
                            <span class="icono"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" id="password" required>
                            <label for="password">Contraseña</label>
                            @error('password')
                                <div class="alerta">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="contenedor-input">
                            <span class="icono"></span>
                            <input type="password" name="password_confirmation" id="password_confirmation" required>
                            <label for="password_confirmation">Repetir Contraseña</label>
                            @error('password_confirmation')
                                <div class="alerta">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
        
                        <button type="submit" class="btn-login">Guardar Registro</button>
        
                        <div class="registrar">
                            <p>¿Si tienes cuenta? <a href="{{route('IndexLogin')}}" class="registrar-link">inicia sesion</a></p>
                        </div>
                    </form>
                </div>
                
            </div>
        








        {{-- <h2>Registro</h2>
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
        </form> --}}
    </main>
@endsection