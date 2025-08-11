@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Actualizar Distribuidor')

@section('content')
<div class="row" id="app">
    <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizando distribuidor</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-distribuidores-update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="distribuidores_id" value="{{$distribuidores->id}}">
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input type="text" name="nombre" value="{{$distribuidor->nombre}}"  class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
            <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Provincia</label>
            <input type="text" name="provincia" value="{{$distribuidor->provincia}}" class="form-control" id="basic-default-fullname"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Ciudad</label>
            <input type="text" name="ciudad" value="{{$distribuidor->ciudad}}" class="form-control" id="basic-default-fullname"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Latitud</label>
            <input type="text" name="latitud" value="{{$distribuidor->latitud}}" class="form-control" id="basic-default-fullname"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Longitud</label>
            <input type="text" name="longitud" value="{{$distribuidor->longitud}}" class="form-control" id="basic-default-fullname"/>
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    </div-col-lg-12>
</div>
@endsection