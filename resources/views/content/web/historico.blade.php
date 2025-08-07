@php

@endphp

@extends('layouts.login-layout')

@section('title', 'Histórico')

@section('content')
 <div class="h-full max-w-[1258px] mx-auto w-full px-[5%] lg:px-[0%] mb-[130px]">
    <table class="mt-[202px] w-full  rounded-t-[8px] overflow-hidden" >
        <thead class="w-full h-[52px] bg-[#F5F5F5] nunitosans h-[16px] text-[#030303] font-[600] border-b border-[#DCDCDC]">
            <tr>
                <th></th>
                <th>Clientes</th>
                <th>Razón social cliente</th>
                <th class="text-left">Nº de Pedido</th>
                <th class="text-left">Fecha del pedido</th>
                <th class="text-left w-[175px]"></th>
                <th class="w-[150px]"></th>
            </tr>
        </thead>
        <tbody class="w-full nunitosans h-[16px] text-[#5C5C5C] font-[400]">
            <tr class="h-[86px] border-b border-[#DCDCDC]">
                <td class="text-center">icono</td>
                <td class="text-center">id cliente</td>
                <td class="text-center">razon</td>
                <td class="text-left">numero pedido</td>
                <td class="">fecha</td>
                <td class="text-left">
                    <button class="flex items-center justify-center h-[42px] w-[141px] text-[#FFA221] font-[600] border border-[#FFA221] rounded-[20px]">Ver detalle</button>
                </td>
                <td class="text-right">
                    <button class="flex items-center justify-center h-[42px] w-[141px] text-[#FFFFFF] font-[600] bg-[#FFA221] rounded-[20px]">Repetir pedido</button>
                </td>
            </tr>
        </tbody>
    </table>
 </div>
@endsection