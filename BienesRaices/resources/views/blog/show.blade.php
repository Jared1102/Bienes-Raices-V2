@extends('layouts.app')
@section('container')
    <main class="contenedor seccion contenido-centrado">
        <h1>{{$entrada->titulo}}</h1>


        <picture>
            {{-- <source srcset="build/img/blog1.webp" type="image/webp">
            <source srcset="build/img/blog1.jpeg" type="image/jpeg"> --}}
            <img loading="lazy" src="{{$entrada->getUrlImagenAttribute()}}" alt="{{$entrada->imagen}}">
        </picture>

        {{-- <p class="informacion-meta">Escrito el: <span>ddd</span> por: <span>{{$entrada->user->name}}</span> </p> --}}
        <p class="informacion-meta">Escrito el: <span>{{ \Carbon\Carbon::parse($entrada->updated_at)->format('d/m/Y') }}</span> por: <span>{{$entrada->user->username}}</span> </p>

        <div class="resumen-propiedad">
            <p>{{$entrada->descripcion}}</p>    
        </div>
        @auth
        @if ((auth()->user()->rol=="Administrador"))
        <div class="centrar-botones">
            <a class="boton-verde alinear-izquierda" href="{{route('BlogEdit',$entrada->id)}}">Editar</a>
            <form class="alinear-izquierda" action="{{route('BlogDestroy',$entrada->id)}}" method="post">
                @csrf @method('DELETE')
                <button class="boton-amarillo-block">Eliminar</button>
            </form>
        </div>
        @endif
        
        @endauth
        
        
    </main>
@endsection