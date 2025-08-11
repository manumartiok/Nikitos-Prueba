@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Contacto')

@section('content')
<div class="row" id="app">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizar Contacto</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-contacto-update') }}" enctype="multipart/form-data">
            @csrf
            <!-- Campo oculto para el ID del registro -->
            <input type="hidden" name="contacto_id" value="{{ $contacto->id ?? '' }}">

            <div class="mb-3">
              <label class="form-label" for="ubicacion">Ubicacion </label>
              <input type="text" name="ubicacion" value="{{ $contacto->ubicacion }}" class="form-control" id="titulo1" placeholder="ubicacion "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="ubicacion_link">Ubicacion link</label>
              <input type="text" name="ubicacion_link" value="{{ $contacto->ubicacion_link }}" class="form-control" id="ubicacion_link" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="telefono">Telefono</label>
              <input type="text" name="telefono" value="{{ $contacto->telefono }}" class="form-control" id="telefono" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="mail">Mail</label>
              <input type="text" name="mail" value="{{ $contacto->mail }}" class="form-control" id="mail" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="horarios">Horarios</label>
              <input type="text" name="horarios" value="{{ $contacto->horarios }}" class="form-control" id="horarios" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="latitud">Latitud</label>
              <input type="text" name="latitud" value="{{ $contacto->latitud }}" class="form-control" id="latitud" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="longitud">Longitud</label>
              <input type="text" name="longitud" value="{{ $contacto->longitud }}" class="form-control" id="longitud" placeholder="Titulo "/>
            </div>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
