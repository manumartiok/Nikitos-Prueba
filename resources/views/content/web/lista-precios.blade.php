@php

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
                <th>Formato</th>
                <th >Peso</th>
                <th class="text-left w-[175px]"></th>
                <th class="w-[150px]"></th>
            </tr>
        </thead>
        <tbody class="w-full nunitosans h-[16px] text-[#5C5C5C] font-[400]">
            <tr class="h-[86px] border-b border-[#DCDCDC]">
                <td class="text-center">icono</td>
                <td>nombre</td>
                <td class="text-center">pdf</td>
                <td class="text-center">340kb</td>
                <td class="text-left">
                    <button class="flex items-center justify-center h-[42px] w-[141px] text-[#FFA221] font-[600] border border-[#FFA221] rounded-[20px]">Ver online</button>
                </td>
                <td class="text-right">
                    <button class="flex items-center justify-center h-[42px] w-[141px] text-[#FFFFFF] font-[600] bg-[#FFA221] rounded-[20px]">Descargar</button>
                </td>
            </tr>
        </tbody>
    </table>
 </div>
@endsection