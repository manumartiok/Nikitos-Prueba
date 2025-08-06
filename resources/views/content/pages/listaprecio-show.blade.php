@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Lista de precio')

@section('content')
<div class="row" id="app">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizar Lista de precio</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-listaprecio-update') }}" enctype="multipart/form-data">
            @csrf
            <!-- Campo oculto para el ID del registro -->
            <input type="hidden" name="lista_id" value="{{ $lista->id ?? '' }}">

            <div class="mb-3">
              <label class="form-label" for="nombre">Nombre de lista</label>
              <input type="text" name="nombre" value="{{ $lista->nombre }}" class="form-control" id="nombre" placeholder="Nombre archivo"/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="logo_url">Lista de precio</label>
              <input type="file" name="archivo" class="form-control" id="archivo"/>
            </div>
            @if (!empty($lista->archivo))
                <small class="form-text text-muted">
                Archivo actual: 
                <a href="{{ asset('storage/' . $lista->archivo) }}" target="_blank">
                    {{ basename($lista->archivo) }}
                </a>
                </small>
            @endif


            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
