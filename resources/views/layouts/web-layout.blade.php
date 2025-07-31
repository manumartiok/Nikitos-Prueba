@php
    $layouts = App\Models\Layout::all();
    $contactos = App\Models\Contacto::all();
@endphp

<!DOCTYPE html>
<html lang="en" class="h-full">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Foto de la pagina  -->
     @foreach ($layouts as $layout)
    <link rel="icon" type="image/x-icon" href="{{ $layout->logo_url }}">
    @endforeach

    <!-- Titulo -->
    <title>@yield('title')</title>
    <!-- Cargar jQuery primero -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CSS  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
    <!-- Vue -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="{{ asset('js/vue.js') }}" defer></script>
    <!-- javascript -->
    <script src="{{ asset('js/web.js') }}" defer></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    @foreach ($layouts as $layout)
     <style>
        .footer-layout{
            height: 451px;
            background-image: url("{{$layout->footer_url}}");
            background-size: cover;
            background-repeat: no-repeat;
        
}
     </style>
</head>
<body class="bg-blac h-full">

    <!-- chat  -->

    <div class="fixed bottom-12 right-4 z-50 ">
        <img src="/assets/img/chat.png" alt="Chat" class="h-[96px] w-[96px] cursor-pointer">
    </div>

    <!-- navbar -->
        <nav class="fixed top-0 left-0 w-full z-50">
        <div id="navbar" class="nav-layout bg-white flex items-center justify-between mx-auto px-5 max-w-[1258px] h-[100px]">
            
            <!-- Logo -->
            <img src="{{$layout->logo_url}}" alt="Logo" class="h-[67px] w-[138px] flex-shrink-0">
            
            <!-- Botón Hamburguesa (solo en móvil) -->
            <button id="menu-toggle" class="lg:hidden text-2xl ml-auto">
            <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Contenedor del menú y botón -->
            <div class="hidden lg:flex items-center justify-between flex-1 max-w-[1000px] mx-auto gap-8">
            
            <!-- Menú centrado -->
            <div class="flex-1 flex justify-center gap-6">
                <a href="{{ route('home') }}" class="nunitosans font-[400] text-[16px] {{ Request::is('home') ? 'font-bold' : '' }}">Home</a>
                <a href="{{ route('productos') }}" class="nunitosans font-[400] text-[16px] {{ Request::is('productos*') ? 'font-bold' : '' }}">Productos</a>
                <a href="{{ route('ubicacion') }}" class="nunitosans font-[400] text-[16px] {{ Request::is('donde-comprar') ? 'font-bold' : '' }}">Donde comprar</a>
                <a href="{{ route('recetas') }}" class="nunitosans font-[400] text-[16px] {{ Request::is('recetas*') ? 'font-bold' : '' }}">Recetas</a>
                <a href="{{ route('nosotros') }}" class="nunitosans font-[400] text-[16px] {{ Request::is('nosotros') ? 'font-bold' : '' }}">Nosotros</a>
                <a href="{{ route('contacto') }}" class="nunitosans font-[400] text-[16px] {{ Request::is('contacto') ? 'font-bold' : '' }}">Contacto</a>
            </div>

            <!-- Botón Ingresar a la derecha -->
            <div class="btn-layout rounded-[20px] h-[42px] w-[165px] flex items-center justify-center hover:scale-105 transition-transform duration-300" style="background-color:#FFA221;">
                <button class="w-full flex justify-center gap-2 mt-1 ">
                <p class="nunitosans font-[600] text-[16px] h-[22px] w-[60px]">Ingresar</p>
                <i class="fa-solid fa-lock text-white h-[20px] w-[20px]"></i>
                </button>
            </div>

            </div>
        </div>

        <!-- Menú mobile -->
        <div id="mobile-menu" class="lg:hidden hidden flex flex-col items-center gap-4 bg-white py-3">
            <a href="{{ route('home') }}" class="nunitosans font-[400] text-[16px] ">Home</a>
            <a href="{{ route('productos') }}" class="nunitosans font-[400] text-[16px] ">Productos</a>
            <a href="{{ route('ubicacion') }}" class="nunitosans font-[400] text-[16px] ">Donde comprar</a>
            <a href="{{ route('recetas') }}" class="nunitosans font-[400] text-[16px] ">Recetas</a>
            <a href="{{ route('nosotros') }}" class="nunitosans font-[400] text-[16px] ">Nosotros</a>
            <a href="{{ route('contacto') }}" class="nunitosans font-[400] text-[16px] ">Contacto</a>
            <div class="btn-layout rounded-[20px] h-[42px] w-[165px] flex items-center justify-center" style="background-color:#FFA221;">
            <button class="w-full flex justify-center gap-2 mt-1">
                <p class="nunitosans font-[400] text-[16px]  h-[22px] w-[60px]">Ingresar</p>
                <i class="fa-solid fa-lock text-white h-[20px] w-[20px]"></i>
            </button>
            </div>
        </div>
        </nav>


    <!-- Contenido -->

    <div>
        @yield('content')
    </div>

    <!-- footer -->
    

    <footer class="footer-layout flex flex-col justify-between ">

        <div class="h-full flex flex-wrap justify-center lg:justify-between  text-black ">
            <div class="content-center basis-full  lg:basis-1/4 flex flex-col items-center justify-center gap-6">
                <div>
                    <img src="{{$layout->logo_url}}" alt="" class="h-[67px] w-[140px]">
                </div>
                <div class="flex justify-center gap-2">
                    <i class="fa-brands fa-facebook-f text-white h-[20px] w-[20px]"></i>
                    <i class="fa-brands fa-instagram text-white h-[20px] w-[20px]"></i>
                </div> 
            </div>
            <div class="content-center hidden lg:flex  lg:basis-1/4 flex items-center">
                <ul >
                    <h3 class="nunitosans font-[700]">Secciones</h3>
                    <div class="flex justify-between pt-6 space-x-11">
                        <div class="space-y-4">
                            <li><a href="{{ route('home') }}" class="nunitosans font-[400]">Home</a></li>
                            <li><a href="{{ route('productos') }}" class="nunitosans font-[400]">Productos</a></li>
                            <li><a href="{{ route('ubicacion') }}" class="nunitosans font-[400]">Donde Comprar</a></li>
                            <li><a href="{{ route('home') }}" class="nunitosans font-[400]">RSE</a></li>
                        </div>
                        <div class="space-y-4">
                            <li><a href="{{ route('recetas') }}" class="nunitosans font-[400]">Recetas</a></li>
                            <li><a href="{{ route('nosotros') }}" class="nunitosans font-[400]">Nosotros</a></li>
                            <li><a href="{{ route('contacto') }}" class="nunitosans font-[400]">Contacto</a></li>
                            <li><a href="{{ route('home') }}" class="nunitosans font-[400]">Politica de calidad</a></li>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="content-center basis-full  lg:basis-1/4 space-y-4 flex flex-col items-center lg:block">
                <h3 class="nunitosans font-[700]">Suscribete al Newsletter</h3>
                <form class="flex  h-[45px] w-[298px]">
                    <input type="email" placeholder="Email" class="nunitosans font-[400] rounded-l-xl px-4 text-black placeholder-black focus:outline-none">
                    <button type="submit" class="bg-white text-orange-500 rounded-r-xl px-4 flex items-center justify-center">
                        <i class="fa-solid fa-arrow-right h-[24px] w-[24px] mt-2"></i>
                    </button>
                </form>
            </div>
            <div class="content-center basis-full  lg:basis-1/4 flex flex-col items-center lg:block ">
                @foreach($contactos as $contacto)
                <h3 class="nunitosans font-[700]">Contacto</h3>
                <div class="space-y-4 pt-6 flex flex-col items-center lg:items-start">
                    <div class="flex space-x-1">
                        <i class="fa-solid fa-location-dot text-white h-[20px] w-[20px]"></i><a href="{{$contacto->ubicacion_link}}" class="nunitosans font-[400]">{{$contacto->ubicacion}}</a>
                    </div>
                    <div class="flex space-x-1">
                        <i class="fa-solid fa-phone text-white h-[20px] w-[20px]"></i><p class="nunitosans font-[400]">{{$contacto->telefono}}</p>
                    </div>
                    <div class="flex space-x-1">
                        <i class="fa-regular fa-envelope text-white h-[20px] w-[20px]"></i><p class="nunitosans font-[400]">{{$contacto->mail}}</p>
                    </div>
                    <div class="flex space-x-1">
                        <i class="fa-solid fa-clock text-white h-[20px] w-[20px]"></i><p class="nunitosans font-[400]">{{$contacto->horarios}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="box-border min-h-[67px] h-[67px]  copy flex justify-between items-center px-12">
            <p> © Copyright &copy;<?php echo date("Y");?> Nilitos Snacks. Todos los derechos reservados</p>
            <a href="https://osole.com.ar/">By <span>Osole</span></a>
        </div>
    
    </footer>
@endforeach
    


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/8noeqswa0qrq9xvu53p0tqe2zyfrrnke3p82kdezojs3slh6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
        selector: 'textarea.editor',
        width: '100%',
        height: 300,
        menubar: false,
        plugins: 'advlist autolink lists link image charmap preview anchor code fontfamily fontsize textcolor colorpicker',
        toolbar: 'undo redo | bold italic underline | fontfamily fontsize forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link    image | code',
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        font_family_formats: "Arial=arial,helvetica,sans-serif;Nunito='Nunito',sans-serif;Nunito Sans='Nunito Sans',sans-serif;Times New Roman=times new roman,times;",

        toolbar_mode: 'sliding',
        content_style: "body { font-family: 'Nunito Sans', sans-serif; font-size:14px; }"

      });
    });

document.addEventListener("DOMContentLoaded", function() { // este renglon espera a que se cargue todo el html antes de ejecutar el codigo
    const toggleBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const navbar = document.querySelector('.nav-layout'); // Usamos class en vez de ID

    toggleBtn.addEventListener('click', function () {
        const isHidden = mobileMenu.classList.contains('hidden');
        mobileMenu.classList.toggle('hidden');

        if (isHidden) {
            navbar.classList.add('nav-layout-open');
        } else {
            navbar.classList.remove('nav-layout-open');
        }
    });
});
    </script>
@yield('scripts')  <!-- Asegúrate de tener esta línea aquí -->

</body>
</html>