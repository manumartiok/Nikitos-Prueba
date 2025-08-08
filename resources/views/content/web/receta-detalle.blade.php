@php

    $banners = App\Models\Banner::first();
    $recetas = App\Models\Receta::all();

    // Excluir la receta actual por su id
    $otrasRecetas = $recetas->where('id', '!=', $receta->id)->take(3);
@endphp

@extends('layouts.web-layout')

@section('title', 'Recetas')

@section('content')
<!-- banner  -->
<div class="relative w-full h-[406px] overflow-hidden">
    <img src="{{$banners->recetas_foto}}" alt="" class=" w-full h-full object-center ">
    <div class="absolute inset-0 z-10 flex flex-col justify-center items-center text-white nunitosans text-[50px] font-[600]">
        <h1>{{$banners->recetas_titulo}}</h1>
    </div>
</div>
<!-- Recetas  -->
<!-- Datos  -->
<div class="flex flex-col md:flex-row h-full md:h-[383px] gap-6 mb-[70px] mt-16">
    <div class=" md:w-1/2">
        <img src="{{$receta->receta_foto}}" alt="" class="h-full w-full rounded-[12px] md:rounded-[0px] md:rounded-r-[12px] flex-shrink-0">
    </div>
    <div class="h-full w-full md:w-1/2 flex flex-col gap-6 px-[5%] lg:px-[0%]">
        <h1 class="nunito text-[35px] font-[700] text-[#030303]">{{$receta->receta_nombre}}</h1>
        <div>
            <h3 class="nunitosans text-[18px] font-[700] text-[#5C5C5C]">Tiempo de preparación</h3>
            <h4 class="nunitosans text-[18px] font-[400] text-[#5C5C5C]">{{$receta->receta_preparacion}}</h4>
        </div>
        <div>
            <h3 class="nunitosans text-[18px] font-[700] text-[#5C5C5C]">Tiempo de cocción</h3>
            <h4 class="nunitosans text-[18px] font-[400] text-[#5C5C5C]">{{$receta->receta_coccion}}</h4>
        </div>
        <div>
            <h3 class="nunitosans text-[18px] font-[700] text-[#5C5C5C]">Porciones</h3>
            <h4 class="nunitosans text-[18px] font-[400] text-[#5C5C5C]">{{$receta->receta_porciones}}</h4>
        </div>
        <div class="flex flex-col gap-4">
            <h3 class="nunitosans text-[18px] font-[700] text-[#5C5C5C]">Comparte esta receta</h3>
            <div class="flex gap-3">
                <i class="fa-brands fa-facebook-f  h-[23px] w-[23px]"></i>
                <i class="fa-brands fa-instagram  h-[23px] w-[23px]"></i>
            </div> 
        </div>
    </div>
</div>
<div class="h-full max-w-[1258px] mx-auto w-full px-[5%] lg:px-[0%]">
    <!-- Pasos  -->
    <div class="flex flex-col md:flex-row mb-[70px] gap-6">
        <div class="w-full md:w-1/2">
            <h1 class="nunitosans text-[28px] font-[700] text-[#030303] mb-5">Ingredientes</h1>
            @foreach($receta->ingredientes as $ingrediente)
                <div class="flex items-center gap-2 py-3">
                    <img src="/assets/img/paso.png" alt="" class="h-[18px] w-[18px]">
                    <p class="nunitosans text-[18px] font-[400] text-[#5C5C5C]">{{ $ingrediente->ingrediente }}</p>
                </div>
            @endforeach
        </div>
        <div class="w-full md:w-1/2">
            <h1 class="nunitosans text-[28px] font-[700] text-[#030303] mb-5">Preparacion</h1>
            @foreach($receta->preparacion as $preparacion)
            <div class="flex gap-2 py-3">
                <div class="flex-shrink-0">
                    <img src="/assets/img/paso.png" alt="" class="h-[18px] w-[18px]">
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="nunitosans text-[17px] font-[700] text-[#5C5C5C]">Paso {{ $preparacion->nro_paso }}</h2>
                    <p class="nunitosans text-[18px] font-[400] text-[#5C5C5C] leading-relaxed">{{ $preparacion->texto_paso }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Otras  -->
    <div class="flex flex-col gap-5 mb-16">
        <h1 class="nunitosans text-[28px] font-[700] text-[#030303]">Otras recetas</h1>
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($otrasRecetas as $receta)
            <a href="{{ route('receta.detalle', $receta->id) }}" class="group h-[422px] sm:w-[403px] flex flex-col border border-[#DCDCDC] rounded-[8px] bg-white overflow-hidden p-4">
                
                <div class="h-[255px] w-full ">
                    <img src="{{ $receta->receta_foto }}" alt="{{ $receta->receta_nombre }}" class="h-full w-full object-cover rounded-t-[8px]">
                </div>

                <div class="flex-1 flex flex-col items-center justify-center text-center px-4 py-3 gap-6">
                    <h1 class="nunitosans font-[700] text-[24px]">{{ $receta->receta_nombre }}</h1>

                    <div class="nunitosans font-[600] text-[16px] mt-2 relative group-hover:text-black transition">
                        Ver receta
                        <span class="block h-[2px] w-0 group-hover:w-3/5 transition-all duration-300 bg-black mx-auto mt-1"></span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
            
        </div>
</div>
@endsection