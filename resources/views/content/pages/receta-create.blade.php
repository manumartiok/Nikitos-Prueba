@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear Receta')

@section('content')
<div class="row">
    <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Creando receta</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-receta-store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nombre</label>
                <input type="text" name="receta_nombre" class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
                <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-company">Foto</label>
                <input type="file" name="receta_foto" class="form-control" id="basic-default-email"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Preparacion</label>
                <input type="text" name="receta_preparacion" class="form-control" id="basic-default-fullname"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Coccion</label>
                <input type="text" name="receta_coccion" class="form-control" id="basic-default-fullname"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Porciones</label>
                <input type="text" name="receta_porciones" class="form-control" id="basic-default-fullname"/>
            </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>  
    </div-col-lg-12>
</div>
@endsection