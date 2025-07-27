@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Ingredientes')

@section('content')
<h4>Ingredientes</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
            <a href="{{route('pages-ingredientes-create')}}" class="btn btn-primary">Añadir nuevo ingrediente</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Receta</th>
          <th>Ingrediente</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        {{-- Agrupamos los productos por receta --}}
        @foreach($ingrediente->groupBy('receta.receta_nombre') as $recetaNombre => $ingrediente)
          <tr>
            <td colspan="7"><strong>{{ $recetaNombre }}</strong></td>
          </tr>
          {{-- Listamos los productos dentro del grupo de cada receta --}}
        @foreach($ingrediente as $ingrediente)
            <tr>
                <td>{{$ingrediente->id}}</td>
                <td>{{$ingrediente->receta ? $ingrediente->receta->receta_nombre : 'Sin receta' }}</td>
                <td>{{$ingrediente->ingrediente}}</td>
                <td>
                  @if ($ingrediente->active)
                  <a href="{{route('pages-ingredientes-switch', $ingrediente->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-ingredientes-switch', $ingrediente->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-ingredientes-show', $ingrediente->id)}}">Editar</a> | <a href="{{route('pages-ingredientes-destroy', $ingrediente->id)}}">Borrar</a></td>
            </tr>
        @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection