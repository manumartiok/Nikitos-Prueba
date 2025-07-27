@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Producto')

@section('content')
<h4>Producto</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
            <a href="{{route('pages-producto-create')}}" class="btn btn-primary">Añadir nuevo producto</a>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Categoria</th>
          <th>Nombre</th>
          <th>Foto</th>
          <th>Descripcion</th>
          <th>Codigo</th>
          <th>Tamaño</th>
          <th>Vida util</th>
          <th>Activo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        {{-- Agrupamos los productos por categoria --}}
        @foreach($producto->groupBy('categoria.nombre_categoria') as $categoriaNombre => $producto)
          <tr>
            <td colspan="7"><strong>{{ $categoriaNombre }}</strong></td>
          </tr>
          {{-- Listamos los productos dentro del grupo de cada categoria --}}
        @foreach($producto as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->categoria ? $producto->categoria->nombre_categoria : 'Sin categoria' }}</td>
                <td>{{$producto->producto_nombre}}</td>
                <td>@if ($producto->producto_foto)
                    <img src="{{ asset($producto->producto_foto) }}" alt="{{ $producto->producto_nombre }}" style="max-width:250px; max-height:150px;">
                @else
                    <p>No hay imagen disponible.</p>
                @endif</td>
                <td>{{$producto->producto_descripcion}}</td>
                <td>{{$producto->producto_codigo}}</td>
                <td>{{$producto->producto_tamaños}}</td>
                <td>{{$producto->producto_vida}}</td>
                <td>
                  @if ($producto->active)
                  <a href="{{route('pages-producto-switch', $producto->id)}}">
                  <span class="badge bg-primary">Activo</span></a>
                  @else
                  <a href="{{route('pages-producto-switch', $producto->id)}}">
                  <span class="badge bg-danger">Inactivo</span></a>
                  @endif
                </td>
                <td><a href="{{route('pages-producto-show', $producto->id)}}">Editar</a> | <a href="{{route('pages-producto-destroy', $producto->id)}}">Borrar</a></td>
            </tr>
        @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection