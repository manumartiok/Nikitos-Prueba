@php

    $casa = App\Models\Home::first(); 
    $categorias = App\Models\CategoriaProducto::all();
    $recetas = App\Models\Receta::all();
    $productos = App\Models\Producto::with('categoria')->where('active', 1)->get();

    $agrupados = collect();
    $usadas = [];

    foreach ($productos->sortBy('categoria_productos_id') as $producto) {
        if (!in_array($producto->categoria_productos_id, $usadas)) {
            $agrupados->push($producto);
            $usadas[] = $producto->categoria_productos_id;
        }

        if ($agrupados->count() >= 4) break;
    }
@endphp

@extends('layouts.web-layout')

@section('title', 'Casa')

@section('content')
<!-- Video -->
<div class="relative h-[768.25px] w-full overflow-hidden">
    <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
        <source src="{{ $casa->video }}" type="video/mp4">
        Tu navegador no soporta video HTML5.
    </video>
    <div class="absolute inset-0 z-10 flex flex-col justify-center  text-white">
        <h1 class="text-4xl nunito font-[600] text-[85px]">{!!$casa->video_tmayor!!}</h1>
        <div class="text-lg nunito font-[600] text-[24px]">
          <p >{!!$casa->video_tmenor!!}</p>
        </div>
        <div class="mt-4 flex gap-4">
            <button class="bg-white rounded-[20px] h-[42px] w-[214px] text-black px-4 py-2 rounded nunitosans font-[600] text-[16px] hover:scale-105 transition-transform duration-300">
              <a href="">Descargar catálogo</a>
              <i class="fa-solid fa-chevron-right"></i>

            </button>
            <a href="#" class="nunitosans rounded-[20px] border border-[#FFFFFF] h-[42px] w-[194px] font-[600] text-[16px] flex items-center justify-center hover:scale-105 transition-transform duration-300">Ver productos</a>
        </div>
    </div>
</div>

<!-- Nosotros -->
<div class="h-[695.63px] w-full relative">
    <img src="{{ $casa->banner_foto }}" alt="" class="absolute w-full h-full object-cover">
    <div class="absolute">
        <h1 class="nunitosans font-[700] text-[45px]">{!!$casa->banner_tmayor!!}</h1>
        <div class="">
            <h2 class="nunitosans font-[400] text-[20px] leading-relaxed">{!!$casa->banner_tmenor!!}</h2>
        </div>
        <button class="nunitosans font-[600] text-[16px] h-[42px] w-[164px] rounded-[20px] text-[#FFA221] bg-[#FFFFFF] hover:scale-105 transition-transform duration-300">Mas info</button>
    </div>
</div>

<!-- Categorías -->
<div class="max-w-[1218px] mx-auto">
    <h1 class="nunitosans font-[700] text-[45px]">{{ $casa->titulo1 }}</h1>
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($categorias->take(4) as $categoria)
            <div class="relative group h-[321px] sm:w-[297px] flex flex-col items-center text-center justify-center rounded-[8px] overflow-hidden">
                <!-- Fondo con hover oscuro -->
                <div class="absolute inset-0 transition duration-300 group-hover:brightness-90" style="background-color:{{ $categoria->color_categoria }}"></div>

                <!-- Contenido -->
                <div class="relative z-10 flex flex-col items-center justify-center h-full">
                    <img src="{{ $categoria->foto_categoria }}" alt="{{ $categoria->nombre_categoria }}" class="h-32 object-cover mb-2">
                    <h1 class="text-white nunitosans font-[700] text-[25px]">{{ $categoria->nombre_categoria }}</h1>

                    <!-- Enlace con subrayado animado -->
                    <a href="#" class="nunitosans font-[600] text-[16px] text-white mt-2 relative group-hover:text-white transition">
                        Ver todos
                        <span class="block h-[2px] w-0 group-hover:w-3/5 transition-all duration-300 bg-white mx-auto mt-1"></span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="w-full flex justify-center">
        <a href="" class="nunitosans font-[600] text-[16px] block mt-4  h-[42px] w-[192px] rounded-[20px] border border-[#030303] flex items-center justify-center hover:scale-105 transition-transform duration-300">Ver todas</a>
    </div>
</div>

<!-- Destacados -->
<div class="max-w-[1218px] mx-auto">
    <h1 class="nunitosans font-[700] text-[45px]">{{ $casa->titulo2 }}</h1>
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($agrupados as $producto)
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

<!-- Recetas -->
<div class="max-w-[1218px] mx-auto">
    <h1 class="nunitosans font-[700] text-[45px]">{{ $casa->titulo3 }}</h1>
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($recetas->take(3) as $receta)
    <div class="group h-[422px] sm:w-[403px] flex flex-col border border-[#DCDCDC] rounded-[8px] bg-white overflow-hidden p-4">
        
        <div class="h-[255px] w-full ">
            <img src="{{ $receta->receta_foto }}" alt="{{ $receta->receta_nombre }}" class="h-full w-full object-cover rounded-t-[8px]">
        </div>

        <div class="flex-1 flex flex-col items-center justify-center text-center px-4 py-3 gap-6">
            <h1 class="nunitosans font-[700] text-[24px]">{{ $receta->receta_nombre }}</h1>

            <a href="" class="nunitosans font-[600] text-[16px] mt-2 relative group-hover:text-black transition">
                Ver receta
                <span class="block h-[2px] w-0 group-hover:w-3/5 transition-all duration-300 bg-black mx-auto mt-1"></span>
            </a>
        </div>
    </div>
        @endforeach
    </div>
</div>

@endsection
