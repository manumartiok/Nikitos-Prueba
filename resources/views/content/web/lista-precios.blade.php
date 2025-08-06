@php
    $lista = App\Models\Pdf::first(); 
@endphp

@extends('layouts.login-layout')

@section('title', 'Lista de precios')

@section('content')
 <div class="h-full max-w-[1258px] mx-auto w-full px-[5%] lg:px-[0%]">
    <table class="mt-[202px] w-full  rounded-t-[8px] overflow-hidden" >
        <thead class="w-full h-[52px] bg-[#F5F5F5] nunitosans h-[16px] text-[#030303] font-[600] border-b border-[#DCDCDC]">
            <tr>
                <th></th>
                <th class="text-left">Nombre</th>
                <th class="text-center">Formato</th>
                <th >Peso</th>
                <th class="text-left w-[175px]"></th>
                <th class="w-[150px]"></th>
            </tr>
        </thead>
        <tbody class="w-full nunitosans h-[16px] text-[#5C5C5C] font-[400]">
            <tr class="h-[86px] border-b border-[#DCDCDC]">
                <td class="text-center">
                    <img src="assets/img/file-text.svg" alt="">
                </td>
                <td>{{$lista->nombre}}</td>
                <td class="text-center uppercase ">{{ pathinfo($lista->archivo, PATHINFO_EXTENSION) }}</td>
                <td class="text-center">
                        @php
                            $path = storage_path('app/public/' . $lista->archivo);
                            $size = file_exists($path) ? filesize($path) : 0;

                            // Convertir a KB o MB
                            if ($size >= 1048576) {
                                $peso = number_format($size / 1048576, 2) . ' MB';
                            } else {
                                $peso = number_format($size / 1024, 2) . ' KB';
                            }
                        @endphp
                        {{ $peso }}
                </td>
                <td class="text-left">
                    <a href="{{ asset('storage/' . $lista->archivo) }}" target="_blank" class="flex items-center justify-center h-[42px] w-[141px] text-[#FFA221] font-[600] border border-[#FFA221] rounded-[20px] hover:scale-105 transition-transform duration-300">Ver online</a>
                </td>
                <td class="text-right">
                    <a href="{{ asset('storage/' . $lista->archivo) }}" download class="flex items-center justify-center h-[42px] w-[141px] text-[#FFFFFF] font-[600] bg-[#FFA221] rounded-[20px] hover:scale-105 transition-transform duration-300">Descargar</a>
                </td>
            </tr>
        </tbody>
    </table>
 </div>
@endsection