@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Crear Producto')

@section('content')
<div class="row">
    <div-col-lg-12>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Creando producto</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route ('pages-producto-store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nombre</label>
              <input type="text" name="producto_nombre" class="form-control" id="basic-default-fullname" placeholder="Nombre" required/>
              <!-- el name del input es lo que va a mandar mediante el post, al laravel para leer la request de la variable -->
            </div>
            <div class="mb-3">
            <label class="form-label" for="selectpickerIcons">Categoria</label>
            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" name="categoria_productos_id">
              @forelse($categoria as $categoria)
               <option value="{{$categoria->id}}" >{{$categoria->nombre_categoria}}</option>

              @empty

              @endforelse
            </select>
          </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Foto</label>
              <input type="file" name="producto_foto" class="form-control" id="basic-default-email"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Descripcion</label>
                <input type="text" name="producto_descripcion" class="form-control" id="basic-default-fullname"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Codigo</label>
                <input type="text" name="producto_codigo" class="form-control" id="basic-default-fullname"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Tamaño</label>
                <input type="text" name="producto_tamaños" class="form-control" id="basic-default-fullname"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Vida util</label>
                <input type="text" name="producto_vida" class="form-control" id="basic-default-fullname"/>
            </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>  
    </div-col-lg-12>
</div>
@endsection