@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Preparacion')

@section('content')
<h4>Preparacion</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
            <a href="{{route('pages-preparacion-create')}}" class="btn btn-primary">Añadir nuevo paso</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Receta</th>
          <th>Numero paso</th>
          <th>Texto paso</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        {{-- Agrupamos los productos por receta --}}
        @foreach($preparacion->groupBy('receta.receta_nombre') as $recetaNombre => $preparacion)
          <tr>
            <td colspan="7"><strong>{{ $recetaNombre }}</strong></td>
          </tr>
          {{-- Listamos los productos dentro del grupo de cada receta --}}
        @foreach($preparacion as $preparacion)
            <tr>
                <td>{{$preparacion->id}}</td>
                <td>{{$preparacion->receta ? $preparacion->receta->receta_nombre : 'Sin receta' }}</td>
                <td>{{$preparacion->nro_paso}}</td>
                <td>{{$preparacion->texto_paso}}</td>
                <td>
                  @if ($preparacion->active)
                  <a href="{{route('pages-preparacion-switch', $preparacion->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-preparacion-switch', $preparacion->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-preparacion-show', $preparacion->id)}}">Editar</a> | <a href="{{route('pages-preparacion-destroy', $preparacion->id)}}">Borrar</a></td>
            </tr>
        @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection