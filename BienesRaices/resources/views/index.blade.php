@extends('layouts.app_index')

@section('container')
    <!--
        Aqui iria todo lo de index original
    -->
    <body>
        <main class="contenedor seccion">
            <h1>Más Sobre Nosotros</h1>
    
            <div class="iconos-nosotros">
                <div class="icono">
                    <img src="{{Vite::asset('resources/img/icono1.svg')}}" alt="Icono seguridad" loading="lazy">
                    <h3>Seguridad</h3>
                    <p>La seguridad del hogar es un aspecto crítico en el sector inmobiliario, y una página web de bienes raíces puede ofrecer valiosa información y consejos sobre este tema para los compradores y propietarios.</p>
                </div>
                <div class="icono">
                    <img src="{{Vite::asset('resources/img/icono2.svg')}}" alt="Icono Precio" loading="lazy">
                    <h3>Precio</h3>
                    <p>Proporcionar datos actualizados sobre los precios de mercado, tendencias de precios y cambios en los valores de propiedades en diferentes áreas y segmentos del mercado.</p>
                </div>
                <div class="icono">
                    <img src="{{Vite::asset('resources/img/icono3.svg')}}" alt="Icono Tiempo" loading="lazy">
                    <h3>A Tiempo</h3>
                    <p>El término "A Tiempo" en nuestra página de bienes raíces significa nuestro compromiso con la eficiencia y la puntualidad en cada paso de tu experiencia.</p>
                </div>
            </div>
        </main><!--Fin de seccion Nosotros-->
    
        <section class="seccion contenedor">
            <h2>Casas y Depas en Venta</h2>
            
            <div class="contenedor-anuncios">
                @foreach ($propiedades as $propiedad)
                    <div class="anuncio">
                        <picture>
                            <img loading="lazy" src="{{$propiedad->getUrlImagenAttribute()}}" alt="Anuncio">
                        </picture>
                        <div class="contenido-anuncio">
                            <h3>{{$propiedad->nombrePropiedad}}</h3>
                            <p>{{$propiedad->resumen}}</p>
                            <p class="precio">${{number_format($propiedad->precio,0,'.',',',)}}</p>
                            <ul class="iconos-caracteristicas">
                                <li>
                                    <img src="{{Vite::asset('resources/img/icono_wc.svg')}}" alt="icono wc" class="icono">
                                    <p>{{$propiedad->noToilet}}</p>
                                </li>
                                <li>
                                    <img src="{{Vite::asset('resources/img/icono_estacionamiento.svg')}}" alt="icono estacionamiento" class="icono">
                                    <p>{{$propiedad->noCocheras}}</p>
                                </li>
                                <li>
                                    <img src="{{Vite::asset('resources/img/icono_dormitorio.svg')}}" alt="icono dormitorio" class="icono">
                                    <p>{{$propiedad->noHabitaciones}}</p>
                                </li>
                            </ul>
                            <a href="{{route('AnuncioShow',$propiedad->id)}}" class="boton-amarillo-block">
                                Ver propiedad
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="alinear-derecha">
                <a href="{{route('AnunciosIndex')}}" class="boton-verde">Ver Todas</a>
            </div>
        </section><!--Fin de seccion de propiedades-->
    
        <section class="imagen-contacto "style="background-image: url({{Vite::asset('resources/img/encuentra.jpg')}})">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
            <a href="{{route('contacto')}}" class="boton-amarillo">Contactános</a>
        </section><!--Fin de seccion contacto-->
    
        <div class="contenedor seccion seccion-inferior">
            <section class="blog">
                <h3>Nuestro Blog</h3>
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
                                <p class="informacion-meta">Escrito el: <span>{{ \Carbon\Carbon::parse($entrada->updated_at)->format('d/m/Y') }}</span> por: <span>{{$entrada->user->username}}</span> </p>

                                <p>
                                    {{$entrada->resumen}}
                                </p>
                            </a>
                        </div>
                    </article>
                <!--Fin entrada-->
                @endforeach
            </section>
    
            <section class="testimoniales">
                <h3>Testimoniales</h3>
    
                <div class="testimonial">
                    <blockquote>
                        El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                    </blockquote>
                    <p>- Maria Guadalupe</p>
                </div>
            </section>
        </div><!--Fin de seccion de blog-->
    </body>

@endsection