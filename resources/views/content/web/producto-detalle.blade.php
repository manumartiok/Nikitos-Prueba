@php

    $banners = App\Models\Banner::first();
    $categorias = App\Models\CategoriaProducto::all();

     $otrosProductos = $producto->categoria->productos()->where('id', '!=', $producto->id)->take(3)->get();
@endphp

@extends('layouts.web-layout')

@section('title', 'Productos')

@section('content')
<!-- banner  -->
<div class="relative w-full h-[406px] overflow-hidden ">
    <img src="{{$banners->producto_foto}}" alt="" class=" w-full h-full object-center ">
    <div class="absolute inset-0 z-10 flex flex-col justify-center items-center text-white nunitosans text-[50px] font-[600]">
        <h1>{{$banners->producto_titulo}}</h1>
    </div>
</div>
<!-- Productos  -->
<div class="flex flex-col h-full max-w-[1258px] mx-auto w-full py-16 px-[5%] lg:px-[0%]">
   
    <div class="flex flex-col md:flex-row gap-6">
        <!-- categorias  -->
        <div class="w-full md:w-1/4 ">
        @foreach ($categorias as $cat)
            @php
                $esSeleccionada = $producto->categoria->id == $cat->id;
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
        <div class="w-full md:w-3/4 flex flex-col gap-6 nunitosans">
           
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full md:w-1/2 max-w-[402px] h-[402px] border rounded-[12px] border-[#DCDCDC] py-[50px]">
                        <img src="{{$producto->producto_foto}}" alt="" class="h-full w-full object-contain">
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col justify-between leading-relaxed"> 
                        <div>
                            <h3 class="text-[13px] font-[800] mb-[-11px]" style="color:{{$producto->categoria->color_categoria}}">{{$producto->categoria->nombre_categoria}}</h3>
                            <h1 class="text-[30px] text-[#030303] font-[700]">{{$producto->producto_nombre}}</h1>
                            <p class="text-[18px] text-[#5C5C5C] font-[400]">{{$producto->producto_descripcion}}</p>
                        </div>
                        <div class="text-[16px] text-[#5C5C5C] leading-relaxed">
                            <div>
                                <h3 class="font-[700]">Código</h3>
                                <p class="font-[400]">{{$producto->producto_codigo}}</p>
                            </div>
                            <div>
                                <h3 class="font-[700]">Tamaño</h3>
                                <p class="font-[400]">{{$producto->producto_tamaños}}</p>
                            </div>
                            <div>
                                <h3 class="font-[700]">Vida útil</h3>
                                <p class="font-[400]">{{$producto->producto_vida}}</p>
                            </div>
                        </div>
                        <div >
                            <button class="h-[42px] w-[243px] rounded-[20px] bg-[#FFA221] text-[#FFFFFF] font-[600] flex items-center justify-center hover:scale-105 transition-transform duration-300">Consultar</button>
                        </div>
                    </div>
                </div>
                <div class="flex gap-6 mb-20">
                    <div class="h-[60px] w-[60px] py-[7px] border border-[#DCDCDC] rounded-[6px]">
                        <img src="{{$producto->producto_foto}}" alt="" class="h-full w-full object-contain">
                    </div>
                    <div class="h-[60px] w-[60px] py-[7px] border border-[#DCDCDC] rounded-[6px]">
                        <img src="{{$producto->producto_foto}}" alt="" class="h-full w-full object-contain">
                    </div>
                </div>
       

            <div class="flex flex-col gap-6">
                <div>
                    <h1 class="text-[28px] font-[700] text-[#030303]">Productos relacionados</h1>
                </div>
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($otrosProductos as $producto)
                    <div class="group h-[321px] sm:w-[297px] flex flex-col border border-[#DCDCDC] rounded-[8px] bg-white overflow-hidden p-6">
                        
                        <div class="max-h-[179px] w-full flex items-center pt-7 pb-10">
                            <img src="{{ $producto->producto_foto }}" alt="{{ $producto->producto_nombre }}" class="h-full w-full object-contain">
                        </div>

                        <div class="flex-1 flex flex-col items-center justify-around text-center">
                            <h3 class="text-[13px] font-[800]" style="color:{{$producto->categoria->color_categoria}}">{{$producto->categoria->nombre_categoria}}</h3>
                            <h1 class="nunitosans font-[700] text-[24px]">{{ $producto->producto_nombre }}</h1>

                            <a href="{{ route('producto.detalle', $producto->id) }}" class="nunitosans text-[#030303] font-[600] text-[16px] mt-2 relative group-hover:text-black transition">
                                Ver producto
                                <span class="block h-[2px] w-0 group-hover:w-2/5 transition-all duration-300 bg-black mx-auto mt-1"></span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection