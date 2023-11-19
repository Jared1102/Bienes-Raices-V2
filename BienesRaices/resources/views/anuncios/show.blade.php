@extends('layouts.app')
@section('container')
    <main class="contenedor seccion contenido-centrado">
        <h1>{{$propiedad->nombrePropiedad}}</h1>
        <picture>
            <img loading="lazy" src="{{$propiedad->getUrlImagenAttribute()}}" alt="{{$propiedad->imagen}}">
        </picture>
        <div class="resumen-propiedad">
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

            <p>{{$propiedad->descripcion}}</p>
        </div>
    </main>
@endsection