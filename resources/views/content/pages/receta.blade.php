@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Recetas')

@section('content')
<h4>Receta</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
        <a href="{{route('pages-receta-create')}}" class="btn btn-primary">Añadir nueva receta</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Foto</th>
          <th>Preparacion</th>
          <th>Coccion</th>
          <th>Porciones</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($receta as $receta)
            <tr>
                <td>{{$receta->id}}</td>
                <td>{{$receta->receta_nombre}}</td>
                <td>@if ($receta->receta_foto)
                    <img src="{{ asset($receta->receta_foto) }}" alt="{{ $receta->receta_nombre }}" style="max-width:300px; max-height:200px;">
                @else
                    <p>No hay imagen disponible.</p>
          @endif</td>
                <td>{{$receta->receta_preparacion}}</td>
                <td>{{$receta->receta_coccion}}</td>
                <td>{{$receta->receta_porciones}}</td>
                <td>
                  @if ($receta->active)
                  <a href="{{route('pages-receta-switch', $receta->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-receta-switch', $receta->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-receta-show', $receta->id)}}">Editar</a> | <a href="{{route('pages-receta-destroy', $receta->id)}}">Borrar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection