@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<div class="row" id="app">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Actualizar Home</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pages-home-update') }}" enctype="multipart/form-data">
            @csrf
            <!-- Campo oculto para el ID del registro -->
            <input type="hidden" name="home_id" value="{{ $home->id ?? '' }}">

            <!-- Video  -->
            <div class="mb-3">
              <label class="form-label" for="video_tmayor">Texto mayor video</label>
              <textarea  name="video_tmayor" class="form-control editor" placeholder="Texto">{{ $home->video_tmayor ?? '' }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label" for="video_tmenor">Texto menor video</label>
              <textarea  name="video_tmenor" class="form-control editor" placeholder="Texto">{{ $home->video_tmenor ?? '' }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label" for="producto_foto">Video </label>
              @if (!empty($home->video))
                <video autoplay loop muted playsinline width="20%" class="mb-3">
                    <source src="{{ $home->video }}" type="video/mp4">
                    Tu navegador no soporta el video.
                </video>
              @endif  
              <input type="file" name="video" class="form-control" accept="video/*" id="video"/>
            </div>

            <!-- Banner  -->
            <div class="mb-3">
              <label class="form-label" for="banner_tmayor">Banner texto mayor</label>
              <textarea  name="banner_tmayor" class="form-control editor" placeholder="Texto">{{ $home->banner_tmayor ?? '' }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label" for="banner_tmenor">Banner texto menor</label>
              <textarea  name="banner_tmenor" class="form-control editor" placeholder="Texto">{{ $home->banner_tmenor ?? '' }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label" for="banner_foto">Foto Banner</label>
              @if (!empty($home->banner_foto))
                <img :src="foto.banner_foto || '{{  $home->banner_foto }}'" alt="Foto" style="width: 20%;" class="img-thumbnail mb-3">
              @endif
              <input type="file" name="banner_foto" class="form-control" id="banner_foto" @change="subirFoto"/>
            </div>

            <!-- Titulos  -->
            <div class="mb-3">
              <label class="form-label" for="titulo1">Titulo 1</label>
              <input type="text" name="titulo1" value="{{ $home->titulo1 }}" class="form-control" id="titulo1" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="titulo2">Titulo 2</label>
              <input type="text" name="titulo2" value="{{ $home->titulo2 }}" class="form-control" id="titulo2" placeholder="Titulo "/>
            </div>

            <div class="mb-3">
              <label class="form-label" for="titulo3">Titulo 3</label>
              <input type="text" name="titulo3" value="{{ $home->titulo3 }}" class="form-control" id="titulo3" placeholder="Titulo "/>
            </div>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection