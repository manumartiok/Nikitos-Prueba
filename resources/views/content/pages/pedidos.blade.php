@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Pedidos')

@section('content')
<h4>Pedidos</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Cliente</th>
          <th>Localidad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($pedido as $pedido)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->codigo_cliente}}</td>
                <td>{{$pedido->localidad}}</td>
                <td><a href="{{route('pages-pedidos-show', $pedido->id)}}">Editar</a> | <a href="{{route('pages-pedidos-destroy', $pedido->id)}}">Borrar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
