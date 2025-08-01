@php

    $banners = App\Models\Banner::first();
    $recetas = App\Models\Receta::all();
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
<div class="h-full max-w-[1258px] mx-auto w-full py-16 px-[5%] lg:px-[0%]">
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($recetas as $receta)
    <div class="group h-[422px] sm:w-[403px] flex flex-col border border-[#DCDCDC] rounded-[8px] bg-white overflow-hidden p-4">
        
        <div class="h-[255px] w-full ">
            <img src="{{ $receta->receta_foto }}" alt="{{ $receta->receta_nombre }}" class="h-full w-full object-cover rounded-t-[8px]">
        </div>

        <div class="flex-1 flex flex-col items-center justify-center text-center px-4 py-3 gap-6">
            <h1 class="nunitosans font-[700] text-[24px]">{{ $receta->receta_nombre }}</h1>

            <a href="{{ route('receta.detalle', $receta->id) }}" class="nunitosans font-[600] text-[16px] mt-2 relative group-hover:text-black transition">
                Ver receta
                <span class="block h-[2px] w-0 group-hover:w-3/5 transition-all duration-300 bg-black mx-auto mt-1"></span>
            </a>
        </div>
    </div>
        @endforeach
    </div>
</div>
@endsection