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
        <textarea name="resumen" id="resumen">{{old('resumen')}}</textarea>
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
        <textarea name="descripcion" id="descripcion">{{old('descripcion')}}</textarea>
        @error('descripcion')
            <div class="alerta">
                {{$message}}
            </div>
        @enderror

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" onchange="mostrarVistaPrevia(event)">
        <div id="vista-previa">
            @if(old('imagen_actual'))
                <img src="{{ old('imagen_actual') }}" alt="Vista previa">
            @endif
        </div>
        @error('imagen')
            <div class="alerta">
                {{ $message }}
            </div>
        @enderror
        <input type="hidden" name="imagen_actual" id="imagen_actual" value="{{ old('imagen_actual') }}">

        <input type="submit" value="Guardar propiedad" class="boton-verde btn-create-anuncio">
        <a href="{{route('AnunciosIndex')}}" class="boton-amarillo btn-create-anuncio">Cancelar</a>
    </form>
</main>

<script>
    function mostrarVistaPrevia(event) {
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var vistaPrevia = document.getElementById('vista-previa');
                    vistaPrevia.innerHTML = '<img src="' + e.target.result + '" alt="Vista previa">';

                    // Almacena la URL de la imagen en el campo oculto
                    document.getElementById('imagen_actual').value = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    function abrirSeleccionadorDeArchivo() {
        // Simula un clic en el input de archivo
        document.getElementById('imagen').click();
    }
</script>
@endsection