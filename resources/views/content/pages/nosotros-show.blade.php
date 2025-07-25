@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Nosotros')

@section('content')
<div class="row" id="app">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizar Nosotros</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-nosotros-update') }}" enctype="multipart/form-data">
            @csrf
            <!-- Campo oculto para el ID del registro -->
            <input type="hidden" name="nosotros_id" value="{{ $nosotros->id ?? '' }}">

            <!-- Seccion 1  -->
            <div class="mb-3">
              <label class="form-label" for="texto1">Texto 1</label>
              <textarea  name="texto1" class="form-control editor" placeholder="Texto">{{ $nosotros->texto1 ?? '' }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label" for="descripcion1">Descripcion 1</label>
              <textarea  name="descripcion1" class="form-control editor" placeholder="Texto">{{ $nosotros->descripcion1 ?? '' }}</textarea>
            </div>  

            <div class="mb-3">
              <label class="form-label" for="banner_foto">Foto 1</label>
              @if (!empty($nosotros->foto1))
                <img :src="foto.foto1 || '{{  $nosotros->foto1 }}'" alt="Foto" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="foto1" class="form-control" id="foto1" @change="subirFoto"/>
            </div>

            <!-- Seccion 2  -->
            <div class="mb-3">
              <label class="form-label" for="texto1">Texto 2</label>
              <textarea  name="texto2" class="form-control editor" placeholder="Texto">{{ $nosotros->texto2 ?? '' }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label" for="descripcion1">Descripcion 2</label>
              <textarea  name="descripcion2" class="form-control editor" placeholder="Texto">{{ $nosotros->descripcion2 ?? '' }}</textarea>
            </div>  

            <div class="mb-3">
              <label class="form-label" for="banner_foto">Foto 2</label>
              @if (!empty($nosotros->foto2))
                <img :src="foto.foto2 || '{{  $nosotros->foto2 }}'" alt="Foto" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="foto2" class="form-control" id="foto2" @change="subirFoto"/>
            </div>

            <!-- Seccion 3 -->
            <div class="mb-3">
              <label class="form-label" for="texto1">Texto 3</label>
              <textarea  name="texto3" class="form-control editor" placeholder="Texto">{{ $nosotros->texto3 ?? '' }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label" for="descripcion1">Descripcion 3</label>
              <textarea  name="descripcion3" class="form-control editor" placeholder="Texto">{{ $nosotros->descripcion3 ?? '' }}</textarea>
            </div>  

            <div class="mb-3">
              <label class="form-label" for="banner_foto">Foto 3</label>
              @if (!empty($nosotros->foto3))
                <img :src="foto.foto3 || '{{  $nosotros->foto3 }}'" alt="Foto" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="foto3" class="form-control" id="foto3" @change="subirFoto"/>
            </div>

            <!-- Seccion 4  -->
            <div class="mb-3">
              <label class="form-label" for="texto1">Texto 4</label>
              <textarea  name="texto1" class="form-control editor" placeholder="Texto">{{ $nosotros->texto4 ?? '' }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label" for="descripcion1">Descripcion 4</label>
              <textarea  name="descripcion4" class="form-control editor" placeholder="Texto">{{ $nosotros->descripcion4 ?? '' }}</textarea>
            </div>  

            <div class="mb-3">
              <label class="form-label" for="banner_foto">Foto 4</label>
              @if (!empty($nosotros->foto4))
                <img :src="foto.foto4 || '{{  $nosotros->foto4 }}'" alt="Foto" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="foto4" class="form-control" id="foto4" @change="subirFoto"/>
            </div>

            
            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection