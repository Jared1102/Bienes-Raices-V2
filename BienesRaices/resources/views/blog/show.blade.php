@extends('layouts.app')
@section('container')
    <main class="contenedor seccion contenido-centrado">
        <h1>{{$entrada->titulo}}</h1>


        <picture>
            {{-- <source srcset="build/img/blog1.webp" type="image/webp">
            <source srcset="build/img/blog1.jpeg" type="image/jpeg"> --}}
            <img loading="lazy" src="{{$entrada->getUrlImagenAttribute()}}" alt="{{$entrada->imagen}}">
        </picture>

        <p class="informacion-meta">Escrito el: <span>ddd</span> por: <span>{{$entrada->user->name}}</span> </p>


        <div class="resumen-propiedad">
            <p>{{$entrada->descripcion}}</p>    
        </div>
    </main>
@endsection