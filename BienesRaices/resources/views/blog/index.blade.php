@extends('layouts.app')

@section('container')
    <!--
        Aqui se colocarian las entradas
    -->
    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
        {{-- <div class="alinear-izquierda">
            <a href="anuncios.html" class="boton-verde">Nueva Entrada</a>
        </div> --}}
        @auth
            @if (auth()->user()->rol=="Administrador")
                <form action="{{route('BlogCreate')}}" method="GET" class="alinear-izquierda">
                    <input type="submit" value="Nueva Entrada" class="boton-verde">
                </form>
            @endif
        @endauth
        
        @foreach ($entradas as $entrada)
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        {{-- <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg"> --}}
                        <img loading="lazy" src="{{$entrada->getUrlImagenAttribute()}}" alt="{{$entrada->imagen}}">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="{{route('BlogShow',$entrada->id)}}">
                        <h4>{{$entrada->titulo}}</h4>
                        <p>Escrito el: <span>{{ \Carbon\Carbon::parse($entrada->updated_at)->format('d/m/Y') }}</span> por: <span>{{$entrada->user->username}}</span> </p>

                        <p>
                            {{$entrada->resumen}}
                        </p>
                    </a>
                </div>
            </article>
        <!--Fin entrada-->
        @endforeach
        <!--Entrada-->
        
    </main>
@endsection