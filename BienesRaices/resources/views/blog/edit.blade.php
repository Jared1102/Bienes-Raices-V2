@extends('layouts.app')
@section('container')
    <main class="contenedor seccion">
        <h1>Editar entrada de blog</h1>

        <form class="formulario" action="{{route('BlogUpdate',$entrada->id)}}" method="post" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <fieldset>
                <legend>Información de la entrada</legend>

                <label for="nombre">Titulo:</label>
                <input type="text" placeholder="Titulo" id="titulo" name="titulo" value="{{old('titulo',$entrada->titulo)}}">
                @error('titulo')
                    <div class="alerta">
                        {{$message}}
                    </div>
                @enderror

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" value="{{old('descripcion',$entrada->descripcion)}}">{{old('descripcion',$entrada->descripcion)}}</textarea>
                @error('descripcion')
                    <div class="alerta">
                        {{$message}}
                    </div>
                @enderror

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" value="{{old('imagen',$entrada->imagen)}}">
                @if ($entrada->imagen)
                @endif
                @error('imagen')
                    <div class="alerta">
                        {{$message}}
                    </div>
                @enderror

                <label for="resumen">Resumen:</label>
                <textarea name="resumen" id="resumen" value="{{old('resumen',$entrada->resumen)}}">{{old('resumen',$entrada->resumen)}}</textarea>
                @error('resumen')
                    <div class="alerta">
                        {{$message}}
                    </div>
                @enderror
                
            </fieldset>
            <input type="submit" value="Guardar" class="boton-verde btn-create-blog">
            <a href="{{route('indexblog')}}" class="boton-amarillo btn-create-blog">Cancelar</a>
        </form>
    </main>
@endsection