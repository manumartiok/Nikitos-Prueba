@php

    $banners = App\Models\Banner::first();
    $categorias = App\Models\CategoriaProducto::all();
@endphp

@extends('layouts.web-layout')

@section('title', 'Nosotros')

@section('content')
<!-- banner  -->
<div class="relative w-full h-[406px] overflow-hidden">
    <img src="{{$banners->producto_foto}}" alt="" class=" w-full h-full object-center ">
    <div class="absolute inset-0 z-10 flex flex-col justify-center items-center text-white nunitosans text-[50px] font-[600]">
        <h1>{{$banners->producto_titulo}}</h1>
    </div>
</div>
<!-- Productos  -->
<div class="flex flex-col py-[5%] px-[5%] gap-6">
    <div class="w-full flex justify-end ">  
        <button class="nunitosans h-[42px] w-[243px] rounded-[20px] border border-[#FFA221] text-[#FFA221] text-[16px] font-[600]">Descargar catálogo</button>
    </div>
    <div class="flex flex-col md:flex-row">
        <!-- categorias  -->
        <div class="w-full md:w-1/4 ">
        @foreach ($categorias as $cat)
            @php
                $esSeleccionada = $categoria->id == $cat->id;
            @endphp
            <div class="h-[45px] w-full md:w-[297px] border-t border-b border-[#DCDCDC]">
                <a href="{{ route('producto.categoria', $cat->id) }}"
                class="nunitosans h-full w-full flex items-center gap-3 font-[400] text-[16px]
                        {{ $esSeleccionada ? 'font-[700] text-[#030303]' : 'text-[#5C5C5C]' }}">
                    <div class="h-[30px] w-[9px]" style="background-color:{{ $cat->color_categoria }}"></div>
                    <span>{{ $cat->nombre_categoria }}</span>
                </a>
            </div>
        @endforeach
        </div>
        <!-- productos  -->
        <div class="w-full md:w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categoria->productos as $producto)
                <div class="group h-[321px] sm:w-[297px] flex flex-col items-center text-center justify-center border border-[#DCDCDC] rounded-[8px]" style="background-color:#FFFFFF">
                    <img src="{{ $producto->producto_foto ?? $producto->categoria->foto_categoria }}" alt="{{ $producto->producto_nombre }}" class="h-32 object-cover mb-2">
                    <h2 class="nunitosans font-[800] text-[13px]" style="color:{{$producto->categoria->color_categoria}}">{{$producto->categoria->nombre_categoria}}</h2>
                    <h1 class="text-black nunitosans font-[700] text-[21px]">{{ $producto->producto_nombre }}</h1>

                    <!-- Enlace con línea animada -->
                    <a href="" class="nunitosans font-[600] text-[16px] mt-2 relative group-hover:text-black transition">
                        Ver producto
                        <span class="block h-[2px] w-0 group-hover:w-2/5 transition-all duration-300 bg-black mx-auto mt-1"></span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection