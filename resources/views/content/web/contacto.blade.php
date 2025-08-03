@php

    $banners = App\Models\Banner::first();
    $contacto = App\Models\Contacto::first();
@endphp

@extends('layouts.web-layout')

@section('title', 'Contacto')

@section('content')
<!-- banner  -->
<div class="relative w-full h-[406px] overflow-hidden">
    <img src="{{$banners->contacto_foto}}" alt="" class=" w-full h-full object-center ">
    <div class="absolute inset-0 z-10 flex flex-col justify-center items-center text-white nunitosans text-[50px] font-[600]">
        <h1>{{$banners->contacto_titulo}}</h1>
    </div>
</div>
<!-- Contacto  -->

<div class="h-full max-w-[1258px] flex flex-col mx-auto py-16 px-[5%] lg:px-[0%]">
    
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-1/3 flex flex-col gap-5">
            <button id="btnformulario1" class="flex items-center gap-2 nunitosans text-[16px] text-[#030303] font-[600] hover:text-[#FFA221]">
                Ventas<i class="fa-solid fa-chevron-right "></i>
            </button>
            <button id="btnformulario2" class="flex items-center gap-2 nunitosans text-[16px] text-[#030303] font-[600] hover:text-[#FFA221] mb-5">
                RRHH<i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        
        <div class="w-full md:w-2/3">
            <!-- formulario 1 -->
            <form action="" id="formulario1" class="w-full flex flex-col gap-6 hidden">
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="razon_social" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Razon social*</label>
                        <input type="text" id="razon_social" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="cuit" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">CUIT*</label>
                        <input type="text" id="cuit" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="negocio" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Tipo de Negocio*</label>
                        <input type="text" id="negocio" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="mercado" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Trayectoria del mercado</label>
                        <input type="text" id="mercado" class="h-[45px] border border-[#DCDCDC] rounded-[8px]">
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="direccion" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Dirección*</label>
                        <input type="text" id="direccion" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="localidad" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Localidad*</label>
                        <input type="text" id="localidad" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="telefono" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Teléfono*</label>
                        <input type="text" id="telefono" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="celular" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Celular*</label>
                        <input type="text" id="celular" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="hora" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Hora de atención*</label>
                        <input type="text" id="hora" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="mail" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Email*</label>
                        <input type="text" id="mail" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
                <div class="w-full flex md:flex-row">
                    <div class="w-full flex flex-col gap-4">
                        <label for="observaciones" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Observaciones*</label>
                        <textarea class="flex-grow-1 border border-[#DCDCDC] rounded-[8px] min-h-[210px]" rows="3" id="observaciones" required></textarea>
                    </div>
                </div>
                <div class="w-full flex justify-between">
                    <h2 class="nunitosans text-[#5C5C5C] text-[16px] font-[400]">*Campos obligatorios</h2>
                    <button class="nunitosans h-[42px] w-[186px] flex items-center justify-center bg-[#FFA221] rounded-[20px] text-[#FFFFFF] text-[16px] font-[600]">Enviar consultas</button>
                </div>
            </form>

            <!-- formulario 2 -->

            <form action="" id="formulario2" class="w-full flex flex-col gap-6 hidden">
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="razon_social" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">RRHH*</label>
                        <input type="text" id="razon_social" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="cuit" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">CUIT*</label>
                        <input type="text" id="cuit" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="negocio" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Tipo de Negocio*</label>
                        <input type="text" id="negocio" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="mercado" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Trayectoria del mercado</label>
                        <input type="text" id="mercado" class="h-[45px] border border-[#DCDCDC] rounded-[8px]">
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="direccion" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Dirección*</label>
                        <input type="text" id="direccion" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="localidad" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Localidad*</label>
                        <input type="text" id="localidad" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="telefono" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Teléfono*</label>
                        <input type="text" id="telefono" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="celular" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Celular*</label>
                        <input type="text" id="celular" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row gap-6">
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="hora" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Hora de atención*</label>
                        <input type="text" id="hora" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full sm:w-1/2 flex flex-col gap-4">
                        <label for="mail" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Email*</label>
                        <input type="text" id="mail" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
                <div class="w-full flex md:flex-row">
                    <div class="w-full flex flex-col gap-4">
                        <label for="observaciones" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Observaciones*</label>
                        <textarea class="flex-grow-1 border border-[#DCDCDC] rounded-[8px] min-h-[210px]" rows="3" id="observaciones" required></textarea>
                    </div>
                </div>
                <div class="w-full flex justify-between">
                    <h2 class="nunitosans text-[#5C5C5C] text-[16px] font-[400]">*Campos obligatorios</h2>
                    <button class="nunitosans h-[42px] w-[186px] flex items-center justify-center bg-[#FFA221] rounded-[20px] text-[#FFFFFF] text-[16px] font-[600]">Enviar consultas</button>
                </div>
            </form>
        </div>
    </div>
    <!-- datos y mapa  -->
    <div class=" flex flex-col md:flex-row ">
        <div class="w-full md:w-1/3 flex flex-col gap-6">
            <h2 class="nunitosans text-[18px] text-[#000000] font-[700]">Datos de contacto</h2>
            <div class="flex">
                <i class="fa-solid fa-location-dot text-[#FFA221] h-[20px] w-[20px]"></i><a href="{{$contacto->ubicacion_link}}" class="nunitosans font-[400] text-[16px] text-[#5C5C5C]">{{$contacto->ubicacion}}</a>
            </div>
            <div class="flex">
                <i class="fa-solid fa-phone text-[#FFA221] h-[20px] w-[20px]"></i><p class="nunitosans font-[400] text-[16px] text-[#5C5C5C]">{{$contacto->telefono}}</p>
            </div>
            <div class="flex">
                <i class="fa-regular fa-envelope text-[#FFA221] h-[20px] w-[20px]"></i><p class="nunitosans font-[400] text-[16px] text-[#5C5C5C]">{{$contacto->mail}}</p>
            </div>
            <div class="flex">
                <i class="fa-solid fa-clock text-[#FFA221] h-[20px] w-[20px]"></i><p class="nunitosans font-[400] text-[16px] text-[#5C5C5C]">{{$contacto->horarios}}</p>
            </div>
        </div>
        <div class="w-full md:w-2/3">

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded",function(){
        const btn1 = document.getElementById('btnformulario1')
        const btn2 = document.getElementById('btnformulario2')
        const form1 = document.getElementById('formulario1')
        const form2 = document.getElementById('formulario2')

        function activar(btnActivo, btnInactivo, formMostrar, formOcultar){
            // Mostrar/ocultar formularios
            formMostrar.classList.remove('hidden');
            formOcultar.classList.add('hidden');

            // Activar boton
            btnActivo.classList.remove('text-[#030303]');
            btnActivo.classList.add('text-[#FFA221]');
            // Desactivar boton
            btnInactivo.classList.remove('text-[#FFA221]');
            btnInactivo.classList.add('text-[#030303]');
        }

         btn1.addEventListener('click', () => {
            activar(btn1, btn2, form1, form2);
    });

        btn2.addEventListener('click', () => {
            activar(btn2, btn1, form2, form1);
    });

        activar(btn1, btn2, form1, form2);
    });
</script>
@endsection