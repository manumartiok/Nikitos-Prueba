@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar Receta')

@section('content')
<div class="row" id="app">
    <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizando receta</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-receta-update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="receta_id" value="{{$receta->id}}">
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nombre</label>
              <input type="text" name="receta_nombre" value="{{$receta->receta_nombre}}"  class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
              <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
            </div>
            <div class="mb-3">
              <label class="form-label" for="foto_categoria">Foto</label>
              @if (!empty($receta->receta_foto))
                <img :src="foto.receta_foto || '{{ $receta->receta_foto }}'" alt="Logo" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="receta_foto" class="form-control" id="receta_foto" @change="subirFoto"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Preparacion</label>
                <input type="text" name="receta_preparacion" value="{{$receta->receta_preparacion}}" class="form-control" id="basic-default-fullname"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Coccion</label>
                <input type="text" name="receta_coccion" value="{{$receta->receta_coccion}}" class="form-control" id="basic-default-fullname"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Porciones</label>
                <input type="text" name="receta_porciones" value="{{$receta->receta_porciones}}" class="form-control" id="basic-default-fullname"/>
            </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div-col-lg-12>
</div>
@endsection