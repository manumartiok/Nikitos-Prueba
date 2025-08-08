@php
$categorias = App\Models\CategoriaProducto::all();
$productos = App\Models\Producto::all();
@endphp

@extends('layouts.login-layout')

@section('title', 'Productos')

@section('content')
<div class="h-full max-w-[1258px] mx-auto w-full px-[5%] lg:px-[0%]">
    <!-- datos -->
    <div class="w-full flex flex-col mt-[202px] mb-[46px] gap-6">
        <h1 class="nunito text-[35px] text-[#030303] font-[700]">Datos del pedido</h1>
        <h3 class="w-1/2 nunitosans text-[16px] text-[#5C5C5C] font-[400] pr-[5%] leading-relaxed">
            Por favor tenga a bien de rellenar los casilleros con la información requerida, de lo contrario no se podra enviar el mismo.
        </h3>
    </div>

    <form action="{{ route('pages-pedidos-store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="nikito_user_id" value="{{ Auth::id() }}">
        <!-- Formulario de datos -->
        <div class="w-full flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-1/2 flex flex-col md:flex-row gap-6">
                <div class="w-full flex flex-col gap-6">
                    <div class="w-full flex flex-col nunitosans text-[#5C5C5C] font-[400px] gap-4">
                        <label for="fecha" class="text-[16px]">Fecha*</label>
                        <input type="date" id="fecha" name="fecha_pedido" class="h-[45px] p-3 text-[14px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <label for="localidad" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Localidad*</label>
                        <input type="text" id="localidad" name="localidad" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <label for="horario" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Horario*</label>
                        <input type="text" id="horario" name="horario" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
                <div class="w-full flex flex-col gap-6">
                    <div class="w-full flex flex-col gap-4">
                        <label for="razon_social" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Razon social*</label>
                        <input type="text" id="razon_social" name="razon_social" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <label for="codigo" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Código de cliente*</label>
                        <input type="text" id="codigo" 	name="codigo_cliente" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <label for="pago" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Condiciones de pago*</label>
                        <input type="text" id="pago" name="condiciones_pago" class="h-[45px] border border-[#DCDCDC] rounded-[8px]" required>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex flex-col gap-6">
                <div class="w-full flex flex-col gap-4">
                    <label for="observaciones" class="nunitosans text-[16px] text-[#5C5C5C] font-[400px]">Observaciones*</label>
                    <textarea class="flex-grow-1 border border-[#DCDCDC] rounded-[8px] min-h-[146px]" name="observaciones" rows="3" id="observaciones" required></textarea>
                </div>
                <div class="w-full flex flex-col gap-4 nunitosans text-[#5C5C5C] font-[400px]">
                    <label for="" class="text-[18px]">¿Queres subir un archivo?*</label>
                    <div class="relative w-full">
                        <input type="file" id="fileInput" name="archivo" class="absolute inset-0 opacity-0 z-10 cursor-pointer" required>
                        <div class="h-[45px] border border-[#EAEAEA] rounded-[12px] text-[14px] text-[#5C5C5C] font-[400] flex justify-between items-center px-4">
                            <span id="fileName" class="truncate">Seleccionar un archivo</span>
                            <i class="fa-solid fa-arrow-up-from-bracket text-[#FFA221]"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full border border-[#DCDCDC] mt-[50px]"></div>

        <!-- Filtro de categoría -->
    <div class="w-full md:w-1/2 my-[64px]">
        <select id="filtroCategoria"
            class="w-full border border-[#DCDCDC] rounded-[8px] px-4 py-[10px] text-sm text-[#5C5C5C] focus:outline-none focus:ring-2 focus:ring-[#FFA221]">
            <option value="" disabled selected>Filtrar por categoría:</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
            @endforeach
        </select>
    </div>



        <!-- Contenedor de la tabla y nombre de categoría (inicialmente oculto) -->
        <div id="contenedorTabla" style="display: none;">
            <h1 id="nombreCategoria" class="nunito text-[28px] text-[#030303] font-[700]"></h1>

            <table class="mt-[19px] w-full rounded-t-[8px] overflow-hidden">
                <thead class="w-full h-[52px] bg-[#F5F5F5] nunitosans h-[16px] text-[#030303] font-[600] border-b border-[#DCDCDC]">
                    <tr>
                        <th></th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Presentacion</th>
                        <th>Cantidad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tablaProductos" class="w-full nunitosans h-[16px] text-[#5C5C5C] font-[400]">
                    @foreach ($productos as $producto)
                        <tr data-categoria-id="{{ $producto->categoria_productos_id }}" class="h-[86px] border-b border-[#DCDCDC]">
                            <td class="text-center"><img class="h-[70px] w-[70px] py-2 px-4 border border-[#DCDCDC] rounded-[8px]" src="{{ $producto->producto_foto }}" alt=""></td>
                            <td>{{ $producto->producto_codigo }}</td>
                            <td class="text-center">{{ $producto->producto_nombre }}</td>
                            <td class="text-center">{{ $producto->producto_tamaños }}</td>
                            <td class="text-center">
                                <input type="number" name="cantidad[{{ $producto->id }}]" min="0" value="0" class="w-[99px] h-[38px] border border-[#DCDCDC] rounded-[8px] text-center" />
                            </td>
                            <td class="text-center">
                                <label class="relative inline-block w-[38px] h-[38px] border border-[#DCDCDC] rounded-[8px] cursor-pointer">
                                    <input type="checkbox" name="productos_seleccionados[]"  value="{{ $producto->id }}" class="peer absolute opacity-0 w-full h-full cursor-pointer">
                                    <span 
                                        class="pointer-events-none absolute top-1/2 left-1/2 w-[18px] h-[18px] bg-[#FFA221] rounded-[4px] scale-0 peer-checked:scale-100 transition-transform -translate-x-1/2 -translate-y-1/2">
                                    </span>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="w-full flex justify-end mt-10 mb-16">
            <button class="h-[42px] w-[253px] bg-[#FFA221] rounded-[20px] nunitosans text-[16px] text-[#FFFFFF] font-[600] hover:scale-105 transition-transform duration-300">
                Relizar pedido
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filtro = document.getElementById('filtroCategoria');
        const filas = document.querySelectorAll('#tablaProductos tr');
        const contenedorTabla = document.getElementById('contenedorTabla');
        const nombreCategoria = document.getElementById('nombreCategoria');
        const fileInput = document.getElementById('fileInput');
        const fileName = document.getElementById('fileName');

        filtro.addEventListener('change', function () {
            const categoriaSeleccionada = this.value;
            const categoriaTexto = this.options[this.selectedIndex].text;

            // Mostrar contenedor con título
            nombreCategoria.textContent = categoriaTexto;
            contenedorTabla.style.display = 'block';

            // Filtrar productos
            filas.forEach(fila => {
                const categoriaId = fila.getAttribute('data-categoria-id');
                if (categoriaSeleccionada === categoriaId) {
                    fila.style.display = '';
                } else {
                    fila.style.display = 'none';
                }
            });
        });

        fileInput.addEventListener('change', function () {
            if (this.files.length > 0) {
                fileName.textContent = this.files[0].name;
            } else {
                fileName.textContent = 'Ningún archivo seleccionado';
            }
        });
    });
</script>
@endsection