@php

    $banners = App\Models\Banner::first();
@endphp

@extends('layouts.web-layout')

@section('title', 'Nosotros')

@section('content')
<!-- banner  -->
<div class="relative w-full h-[406px] overflow-hidden">
    <img src="{{$banners->contacto_foto}}" alt="" class=" w-full h-full object-center ">
    <div class="absolute inset-0 z-10 flex flex-col justify-center items-center text-white nunitosans text-[50px] font-[600]">
        <h1>{{$banners->contacto_titulo}}</h1>
    </div>
</div>
<!-- Contacto  -->

<div class="h-full max-w-[1258px] mx-auto py-16 px-[5%] lg:px-[0%]">

</div>
@endsection