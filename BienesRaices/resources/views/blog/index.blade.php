@extends('layouts.app')

@section('container')
    <!--
        Aqui se colocarian las entradas
    -->
    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
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
                    <a href="">
                        <h4>{{$entrada->titulo}}</h4>
                        <p>Escrito el: <span>20/10/2023</span> por: <span>{{$entrada->user->name}}</span> </p>

                        <p>
                            {{$entrada->descripcion}}
                        </p>
                    </a>
                </div>
            </article>
        <!--Fin entrada-->
        @endforeach
        <!--Entrada-->
        
    </main>
@endsection