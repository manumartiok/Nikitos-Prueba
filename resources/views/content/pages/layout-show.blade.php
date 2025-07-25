@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Layout')

@section('content')
<div class="row" id="app">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizar Datos del Layout</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-layout-update') }}" enctype="multipart/form-data">
            @csrf
            <!-- Campo oculto para el ID del registro -->
            <input type="hidden" name="layout_id" value="{{ $layout->id ?? '' }}">

            <!-- Links -->
            <div class="mb-3">
              <label class="form-label" for="link_ig">Link de instagram</label>
              <input type="text" name="link_ig" value="{{ $layout->link_ig }}" class="form-control" id="link_ig" placeholder="Link de instagram"/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="link_fb">Link de facebook</label>
              <input type="text" name="link_fb" value="{{ $layout->link_fb }}" class="form-control" id="link_fb" placeholder="Link de facebook"/>
            </div>

            <!-- Fondo -->
            <div class="mb-3">
              <label class="form-label" for="logo_url">Foto Logo</label>
              @if (!empty($layout->logo_url))
                <img :src="foto.logo_url || '{{  $layout->logo_url }}'" alt="Logo" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="logo_url" class="form-control" id="logo_url" @change="subirFoto"/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="footer_url">Foto Footer</label>
              @if (!empty($layout->footer_url))
                <img :src="foto.footer_url || '{{  $layout->footer_url }}'" alt="Footer" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="footer_url" class="form-control" id="footer_url" @change="subirFoto"/>
            </div>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
