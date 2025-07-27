@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar preparacion')

@section('content')
<div class="row" id="app">
    <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizando paso</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-preparacion-update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="preparacion_id" value="{{$preparacion->id}}">
         
              <div class="mb-3">
                <label class="form-label" for="selectpickerIcons">Receta</label>
                <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" name="recetas_id">
                @forelse($receta as $receta)
                <option value="{{$receta->id}}" @if($receta->id==$preparacion->recetas_id) selected @endif>{{$receta->receta_nombre}}</option>
                @empty
                @endforelse
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nro paso</label>
                <input type="text" name="nro_paso" value="{{$preparacion->nro_paso}}"  class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
                <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Txt paso</label>
                <input type="text" name="texto_paso" value="{{$preparacion->texto_paso}}"  class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
                <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
              </div>
  
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div-col-lg-12>
</div>
@endsection