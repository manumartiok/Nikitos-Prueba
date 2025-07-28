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
     <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
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
        <div class="nav-layout bg-white flex justify-between items-center mx-auto px-5">
                
                <img src="{{$layout->logo_url}}" alt="Logo" class="h-[67px] w-[138px]">
                
            <div class="flex justify-between h-[22px] w-[537px] ">
                <a href="{{ route('home') }}" class="text-layout {{ Request::is('home') ? 'font-bold' : '' }}">Home</a>
                <a href="{{ route('productos') }}" class="text-layout {{ Request::is('productos') ? 'font-bold' : '' }}">Productos</a>
                <a href="{{ route('ubicacion') }}" class="text-layout {{ Request::is('donde-comprar') ? 'font-bold' : '' }}">Donde comprar</a>
                <a href="{{ route('recetas') }}" class="text-layout {{ Request::is('recetas') ? 'font-bold' : '' }}">Recetas</a>
                <a href="{{ route('nosotros') }}" class="text-layout {{ Request::is('nosotros') ? 'font-bold' : '' }}">Nosotros</a>
                <a href="{{ route('contacto') }}" class="text-layout {{ Request::is('contacto') ? 'font-bold' : '' }}">Contacto</a>
            </div>
            <div class="btn-layout flex h-[42px] w-[165px]  items-center" style="background-color:#FFA221;">
                <button class="w-full flex justify-center gap-2 mt-1">
                    <p class="h-[22px] w-[60px]" >Ingresar</p> 
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

        <div class="h-full flex justify-between  text-black  mx-[98px]">
            <div class="content-center basis-1/4 flex flex-col items-center justify-center gap-6">
                <div>
                    <img src="{{$layout->logo_url}}" alt="" class="h-[67px] w-[140px]">
                </div>
                <div class="flex justify-center gap-2">
                    <i class="fa-brands fa-facebook-f text-white h-[20px] w-[20px]"></i>
                    <i class="fa-brands fa-instagram text-white h-[20px] w-[20px]"></i>
                </div> 
            </div>
            <div class="content-center basis-1/4 flex items-center">
                <ul class="">
                    <h3>Secciones</h3>
                    <div class="flex justify-between pt-6 space-x-11">
                        <div class="space-y-4">
                            <li><a href="{{ route('home') }}" class="text-layout">Home</a></li>
                            <li><a href="{{ route('productos') }}" class="text-layout">Productos</a></li>
                            <li><a href="{{ route('ubicacion') }}" class="text-layout">Donde Comprar</a></li>
                            <li><a href="{{ route('home') }}" class="text-layout">RSE</a></li>
                        </div>
                        <div class="space-y-4">
                            <li><a href="{{ route('recetas') }}" class="text-layout">Recetas</a></li>
                            <li><a href="{{ route('nosotros') }}" class="text-layout">Nosotros</a></li>
                            <li><a href="{{ route('contacto') }}" class="text-layout">Contacto</a></li>
                            <li><a href="{{ route('home') }}" class="text-layout">Politica de calidad</a></li>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="content-center basis-1/4 space-y-4">
                <h3>Suscribete al Newsletter</h3>
                <form class="flex  h-[45px] w-[298px]">
                    <input type="email" placeholder="Email" class="rounded-l-xl px-4 text-black placeholder-black focus:outline-none">
                    <button type="submit" class="bg-white text-orange-500 rounded-r-xl px-4 flex items-center justify-center">
                        <i class="fa-solid fa-arrow-right h-[24px] w-[24px] mt-2"></i>
                    </button>
                </form>
            </div>
            <div class="content-center basis-1/4 ">
                @foreach($contactos as $contacto)
                <h3>Contacto</h3>
                <div class="space-y-4 pt-6">
                    <div class="flex space-x-1">
                        <i class="fa-solid fa-location-dot text-white h-[20px] w-[20px]"></i><a href="{{$contacto->ubicacion_link}}" class="text-layout">{{$contacto->ubicacion}}</a>
                    </div>
                    <div class="flex space-x-1">
                        <i class="fa-solid fa-phone text-white h-[20px] w-[20px]"></i><p class="text-layout">{{$contacto->telefono}}</p>
                    </div>
                    <div class="flex space-x-1">
                        <i class="fa-regular fa-envelope text-white h-[20px] w-[20px]"></i><p class="text-layout">{{$contacto->mail}}</p>
                    </div>
                    <div class="flex space-x-1">
                        <i class="fa-solid fa-clock text-white h-[20px] w-[20px]"></i><p class="text-layout">{{$contacto->horarios}}</p>
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
    



    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
          tinymce.init({
        selector: 'textarea.editor',
        width: '100%', // O usa un valor más alto si necesitas un tamaño fijo, por ejemplo, '800px'
        height: 300,
        menubar: false,
        plugins: 'advlist autolink lists link image charmap preview anchor code fontselect fontsizeselect',
        toolbar: 'undo redo | bold italic | fontselect fontsizeselect | alignleft aligncenter alignright | bullist numlist outdent indent | link image | code',
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        content_style: 'body { font-family:Arial; font-size:14px; }'
    });

});
    </script>
@yield('scripts')  <!-- Asegúrate de tener esta línea aquí -->

</body>
</html>