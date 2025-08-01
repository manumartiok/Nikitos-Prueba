@php

    $banners = App\Models\Banner::first();
    $categorias = App\Models\CategoriaProducto::all();
@endphp

@extends('layouts.web-layout')

@section('title', 'Producto')

@section('content')
<!-- banner  -->
<div class="relative w-full h-[406px] overflow-hidden">
    <img src="{{$banners->producto_foto}}" alt="" class=" w-full h-full object-center ">
    <div class="absolute inset-0 z-10 flex flex-col justify-center items-center text-white nunitosans text-[50px] font-[600]">
        <h1>{{$banners->producto_titulo}}</h1>
    </div>
</div>

<!-- Productos  -->
<div class="h-full max-w-[1258px] mx-auto w-full py-16 px-[5%] lg:px-[0%]">
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($categorias as $categoria)
            <div class="relative group h-[321px] sm:w-[297px] flex flex-col items-center text-center justify-center rounded-[8px] overflow-hidden">
                <!-- Fondo con hover oscuro -->
                <div class="absolute inset-0 transition duration-300 group-hover:brightness-90" style="background-color:{{ $categoria->color_categoria }}"></div>

                <!-- Contenido -->
                <div class="relative z-10 flex flex-col items-center justify-center h-full">
                    <img src="{{ $categoria->foto_categoria }}" alt="{{ $categoria->nombre_categoria }}" class="h-32 object-cover mb-2">
                    <h1 class="text-white nunitosans font-[700] text-[25px]">{{ $categoria->nombre_categoria }}</h1>

                    <!-- Enlace con subrayado animado -->
                    <a href="{{ route('producto.categoria', $categoria->id) }}" class="nunitosans font-[600] text-[16px] text-white mt-2 relative group-hover:text-white transition">
                        Ver todos
                        <span class="block h-[2px] w-0 group-hover:w-3/5 transition-all duration-300 bg-white mx-auto mt-1"></span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection