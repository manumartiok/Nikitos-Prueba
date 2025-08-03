@php

@endphp

@extends('layouts.login-layout')

@section('title', 'Productos')

@section('content')
 <div class="h-full max-w-[1258px] mx-auto w-full px-[5%] lg:px-[0%]">
    <!-- datos  -->
    <div class="w-full flex flex-col mt-[202px] mb-[46px] gap-6">
            <h1 class="nunito text-[35px] text-[#030303] font-[700]">Datos del pedido</h1>
            <h3 class="w-1/2 nunitosans text-[16px] text-[#5C5C5C] font-[400] pr-[5%] leading-relaxed">Por favor tenga a bien de rellenar los casilleros con la información requerida, de lo contrario no se podra enviar el mismo.</h3>
    </div>
<form action="">
        <div class="w-full flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-1/2 flex flex-col md:flex-row gap-6">
                <div class="w-full flex flex-col gap-6">
                    <div class="w-full flex flex-col nunitosans text-[#5C5C5C] font-[400px] gap-4">
                        <label for="fecha" class="text-[16px]">Fecha*</label>
                        <input type="date" id="fecha" class="h-[45px] p-3 text-[14px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <label for="localidad" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Localidad*</label>
                        <input type="text" id="localidad" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <label for="horario" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Horario*</label>
                        <input type="text" id="horario" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
                <div class="w-full flex flex-col gap-6">
                    <div class="w-full flex flex-col gap-4">
                        <label for="razon_social" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Razon social*</label>
                        <input type="text" id="razon_social" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <label for="codigo" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Código de cliente*</label>
                        <input type="text" id="codigo" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <label for="pago" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Condiciones de pago*</label>
                        <input type="text" id="pago" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex flex-col gap-6">
                <div class="w-full flex flex-col gap-4">
                    <label for="observaciones" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Observaciones*</label>
                    <textarea class="flex-grow-1 border border-[#DCDCDC] rounded-[8px] min-h-[146px]" rows="3" id="observaciones" required></textarea>
                </div>
                <div class="w-full flex flex-col gap-4 nunitosans  text-[#5C5C5C] font-[400px]">
                    <label for="" class="text-[18px]">¿Queres subir un archivo?*</label>
                <div class="relative w-full">
                    <input type="file" id="fileInput" class="absolute inset-0 opacity-0 z-10 cursor-pointer" required>
                    
                    <div class="h-[45px] border border-[#EAEAEA] rounded-[12px] text-[14px] text-[#5C5C5C] font-[400] flex justify-between items-center px-4">
                        <span id="fileName" class="truncate ">Seleccionar un archivo</span>
                        <i class="fa-solid fa-arrow-up-from-bracket text-[#FFA221]"></i>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="w-full border border-[#DCDCDC] mt-[50px]"></div>
        
    <!-- filtro  -->
    <div>
        
    </div>
</form>
 </div>

 <script>
    const fileInput = document.getElementById('fileInput');
    const fileName = document.getElementById('fileName');

    fileInput.addEventListener('change', function () {
        if (this.files.length > 0) {
        fileName.textContent = this.files[0].name;
        } else {
        fileName.textContent = 'Ningún archivo seleccionado';
        }
    });
 </script>
@endsection