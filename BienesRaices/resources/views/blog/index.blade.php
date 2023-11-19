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
                        <img loading="lazy" src="{{Vite::asset('resources/img/blog1.jpg')}}" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>20/10/2023</span> por: <span>Admin</span> </p>

                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>
        <!--Fin entrada-->
        @endforeach
        <!--Entrada-->
        
    </main>
@endsection