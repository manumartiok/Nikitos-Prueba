@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Distribuidores')

@section('content')
<h4>Distribuidores</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
        <a href="{{route('pages-distribuidores-create')}}" class="btn btn-primary">Añadir nuevo distribuidor</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Provincia</th>
          <th>Ciudad</th>
          <th>Latitud</th>
          <th>Longitud</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($distribuidor as $distribuidor)
            <tr>
                <td>{{$distribuidor->id}}</td>
                <td>{{$distribuidor->nombre}}</td>
                <td>{{$distribuidor->provincia}}</td>
                <td>{{$distribuidor->ciudad}}</td>
                <td>{{$distribuidor->latitud}}</td>
                <td>{{$distribuidor->longitud}}</td>
                <td>
                  @if ($distribuidor->active)
                  <a href="{{route('pages-distribuidores-switch', $distribuidor->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-distribuidores-switch', $distribuidor->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-distribuidores-show', $distribuidor->id)}}">Editar</a> | <a href="{{route('pages-distribuidores-destroy', $distribuidor->id)}}">Borrar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection