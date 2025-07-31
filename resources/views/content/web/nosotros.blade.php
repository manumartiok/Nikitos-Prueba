@php

    $nosotros = App\Models\Nosotro::first(); 
    $banners = App\Models\Banner::first();
@endphp

@extends('layouts.web-layout')

@section('title', 'Nosotros')

@section('content')

<!-- banner  -->
<div class="relative w-full h-[406px] overflow-hidden">
    <img src="{{$banners->nosotros_foto}}" alt="" class=" w-full h-full object-center ">
    <div class="absolute inset-0 z-10 flex flex-col justify-center items-center text-white nunitosans text-[50px] font-[600]">
        <h1>{{$banners->nosotros_titulo}}</h1>
    </div>
</div>
 <!-- 1 -->
<div class="flex md:flex-row flex-col h-[507px] pl-[5%] pr-[5%] md:pr-[0%] mt-[65px]  gap-x-[100px] gap-y-6">
    <div class="flex flex-col w-full md:w-1/2 justify-center items-center md:items-start gap-4">
        <h1 class="nunito text-[35px] font-[700]  text-[#030303]">{!! $nosotros->texto1 !!}</h1>
        <h2 class="nunito text-[16px] font-[400]  text-[#5C5C5C] leading-relaxed"> {!! $nosotros->descripcion1 !!}</h2>
    </div>
    <div class="h-full w-full   md:w-1/2">
        <img src="{{$nosotros->foto1}}" alt="" class="w-full h-full rounded-[12px] md:rounded-[0px] md:rounded-l-[12px] object-cover">
    </div>
</div>
<!-- 2 -->
<div class="flex md:flex-row flex-col pl-[5%] pr-[5%] h-[352px] justify-center gap-x-[50px] mt-[280px] md:mt-[90px]">
    <div class="h-full w-full md:w-1/3 hidden md:flex">
        <img src="{{$nosotros->foto2}}" alt="" class="h-full w-full rounded-[24px]  object-cover">
    </div>
    <div class="flex flex-col w-full md:w-2/3 justify-center items-center md:items-start gap-6">
        <h1 class="nunitosans text-[28px] font-[700]  text-[#030303]">{!! $nosotros->texto2 !!}</h1>
        <h2 class="nunitosans text-[16px] font-[400]  text-[#5C5C5C] leading-relaxed">{!! $nosotros->descripcion2 !!}</h2>
    </div>
</div> 
<!-- 3 -->
<div class="flex md:flex-row flex-col pl-[5%] pr-[5%] h-[352px] gap-x-[50px] gap-y-4">
    <div class="flex flex-col w-full md:w-2/3 justify-center items-center md:items-start gap-6">
        <h1  class="nunitosans text-[28px] font-[700]  text-[#030303]">{!! $nosotros->texto3 !!}</h1>
        <h2 class="nunitosans text-[16px] font-[400]  text-[#5C5C5C] leading-relaxed">{!! $nosotros->descripcion3 !!}</h2>
    </div>
    <div class="h-full w-full md:w-1/3">
        <img src="{{$nosotros->foto3}}" alt="" class="h-full w-full rounded-[24px] object-cover">
    </div>
</div>
<!-- 4 -->
<div class="flex md:flex-row flex-col pl-[5%] pr-[5%] h-[352px] mb-[65px] justify-center gap-x-[50px]">
    <div class="h-full w-full md:w-1/3  hidden md:flex">
        <img src="{{$nosotros->foto4}}" alt="" class="h-full w-full rounded-[24px] object-cover">
    </div>  
    <div class="flex flex-col w-full md:w-2/3 justify-center items-center md:items-start gap-6">
        <h1  class="nunitosans text-[28px] font-[700]  text-[#030303]">{!! $nosotros->texto4 !!}</h1>
        <h2 class="nunitosans text-[16px] font-[400]  text-[#5C5C5C] leading-relaxed">{!! $nosotros->descripcion4 !!}</h2>
    </div>
</div>
@endsection