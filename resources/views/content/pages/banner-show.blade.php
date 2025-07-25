@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Banners')

@section('content')
<div class="row" id="app">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizar Banners</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-banner-update') }}" enctype="multipart/form-data">
            @csrf
            <!-- Campo oculto para el ID del registro -->
            <input type="hidden" name="banner_id" value="{{ $banner->id ?? '' }}">

            <!-- Producto -->
            <div class="mb-3">
              <label class="form-label" for="producto_titulo">Titulo Producto</label>
              <input type="text" name="producto_titulo" value="{{ $banner->producto_titulo }}" class="form-control" id="producto_titulo" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="producto_foto">Foto Producto</label>
              @if (!empty($banner->producto_foto))
                <img :src="foto.producto_foto || '{{  $banner->producto_foto }}'" alt="Foto" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="producto_foto" class="form-control" id="producto_foto" @change="subirFoto"/>
            </div>

            <!-- Donde comprar -->
            <div class="mb-3">
              <label class="form-label" for="ubicacion_titulo">Titulo Donde Comprar</label>
              <input type="text" name="ubicacion_titulo" value="{{ $banner->ubicacion_titulo }}" class="form-control" id="ubicacion_titulo" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="ubicacion_foto">Foto Donde Comprar</label>
              @if (!empty($banner->ubicacion_foto))
                <img :src="foto.ubicacion_foto || '{{  $banner->ubicacion_foto }}'" alt="Foto" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="ubicacion_foto" class="form-control" id="ubicacion_foto" @change="subirFoto"/>
            </div>

            <!-- Recetas -->
            <div class="mb-3">
              <label class="form-label" for="recetas_titulo">Titulo Recetas</label>
              <input type="text" name="recetas_titulo" value="{{ $banner->recetas_titulo }}" class="form-control" id="recetas_titulo" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="recetas_foto">Foto Recetas</label>
              @if (!empty($banner->recetas_foto))
                <img :src="foto.recetas_foto || '{{  $banner->recetas_foto }}'" alt="Foto" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="recetas_foto" class="form-control" id="recetas_foto" @change="subirFoto"/>
            </div>

            <!--Nosotros -->
            <div class="mb-3">
              <label class="form-label" for="nosotros_titulo">Titulo Nosotros</label>
              <input type="text" name="nosotros_titulo" value="{{ $banner->nosotros_titulo }}" class="form-control" id="nosotros_titulo" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="nosotros_foto">Foto Nosotros</label>
              @if (!empty($banner->nosotros_foto))
                <img :src="foto.nosotros_foto || '{{  $banner->nosotros_foto }}'" alt="Foto" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="nosotros_foto" class="form-control" id="nosotros_foto" @change="subirFoto"/>
            </div>

            <!-- Contacto -->
            <div class="mb-3">
              <label class="form-label" for="contacto_titulo">Titulo Contacto</label>
              <input type="text" name="contacto_titulo" value="{{ $banner->contacto_titulo }}" class="form-control" id="contacto_titulo" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="contacto_foto">Foto Contacto</label>
              @if (!empty($banner->contacto_foto))
                <img :src="foto.contacto_foto || '{{  $banner->contacto_foto }}'" alt="Foto" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="contacto_foto" class="form-control" id="contacto_foto" @change="subirFoto"/>
            </div>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection