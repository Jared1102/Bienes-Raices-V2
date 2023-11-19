@extends('layouts.app')
@section('container')
<main class="contenedor seccion">
    <h1>Nueva propiedad</h1>
    <form action="{{route('AnunciosStore')}}" method="post" class="formulario" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre propiedad:</label>
        <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
        @error('nombre')
            <div class="alerta">
                {{$message}}
            </div>
        @enderror

        <label for="resumen">Resumen:</label>
        <textarea name="resumen" id="resumen" value="{{old('resumen')}}"></textarea>
        @error('resumen')
            <div class="alerta">
                {{$message}}
            </div>
        @enderror

        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" value="{{old('precio')}}">
        @error('precio')
            <div class="alerta">
                {{$message}}
            </div>
        @enderror

        <label for="noToilet">No. Baños:</label>
        <input type="text" name="noToilet" id="noToilet" value="{{old('noToilet')}}">
        @error('noToilet')
            <div class="alerta">
                {{$message}}
            </div>
        @enderror

        <label for="noCocheras">No. Estacionamientos:</label>
        <input type="text" name="noCocheras" id="noCocheras" value="{{old('noCocheras')}}">
        @error('noCocheras')
            <div class="alerta">
                {{$message}}
            </div>
        @enderror

        <label for="noHabitaciones">No. Habitaciones:</label>
        <input type="text" name="noHabitaciones" id="noHabitaciones" value="{{old('noHabitaciones')}}">
        @error('noHabitaciones')
            <div class="alerta">
                {{$message}}
            </div>
        @enderror

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" value="{{old('descripcion')}}"></textarea>
        @error('descripcion')
            <div class="alerta">
                {{$message}}
            </div>
        @enderror

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" value="{{old('imagen')}}">
        @error('imagen')
            <div class="alerta">
                {{$message}}
            </div>
        @enderror

        <input type="submit" value="Guardar propiedad" class="boton-verde btn-create-anuncio">
        <a href="{{route('AnunciosIndex')}}" class="boton-amarillo btn-create-anuncio">Cancelar</a>
    </form>
</main>
@endsection