@extends('layouts.app')

@section('container')
    <!--
        Aqui se colocarian las ventas y propiedaes
    -->
    <main class="contenedor seccion">
        <h2>Casas y Depas en Venta</h2>
        <div class="centrar-enlace">
            <a href="{{route('AnunciosCreate')}}" class="boton-verde">Nueva propiedad</a>
        </div>
        
        <!--Anuncios-->
        <div class="contenedor-anuncios">
            @foreach ($propiedades as $propiedad)
                <div class="anuncio">
                    <picture>
                        <img loading="lazy" src="{{$propiedad->getUrlImagenAttribute()}}" alt="{{$propiedad->imagen}}">
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
    </main>
@endsection