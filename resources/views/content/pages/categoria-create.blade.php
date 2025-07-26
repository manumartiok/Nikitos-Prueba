@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear Categoria')

@section('content')
<div class="row">
    <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Creando categoria</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-categoria-store')}}" enctype="multipart/form-data">
            @csrf
              <div class="mb-3">
            <label class="form-label" for="basic-default-company">Foto</label>
            <input type="file" name="foto_categoria" class="form-control" id="basic-default-email"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre</label>
            <input type="text" name="nombre_categoria" class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
            <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Color</label>
            <input type="text" name="color_categoria" class="form-control" id="basic-default-fullname"/>
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>  
    </div-col-lg-12>
</div>
@endsection