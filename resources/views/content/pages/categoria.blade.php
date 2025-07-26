@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Categorias')

@section('content')
<h4>Categorias</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
        <a href="{{route('pages-categoria-create')}}" class="btn btn-primary">Añadir nueva categoria</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Foto</th>
          <th>Color</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($categoria as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->nombre_categoria}}</td>
                <td>@if ($categoria->foto_categoria)
                    <img src="{{ asset($categoria->foto_categoria) }}" alt="{{ $categoria->nombre_categoria }}" style="max-width:500px; max-height:300px;">
                @else
                    <p>No hay imagen disponible.</p>
          @endif</td>
                <td>{{$categoria->color_categoria}}</td>
                <td>
                  @if ($categoria->active)
                  <a href="{{route('pages-categoria-switch', $categoria->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-categoria-switch', $categoria->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-categoria-show', $categoria->id)}}">Editar</a> | <a href="{{route('pages-categoria-destroy', $categoria->id)}}">Borrar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection