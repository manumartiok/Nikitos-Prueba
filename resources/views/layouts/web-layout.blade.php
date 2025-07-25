@php
    $layouts = App\Models\Layout::all();
@endphp

<!DOCTYPE html>
<html lang="en" class="h-full">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- navbar -->
    <nav class="fixed top-0 left-0 w-full z-50 ">
        <div class="nav-layout bg-white flex justify-between items-center mx-auto">
                
                <img src="{{$layout->logo_url}}" alt="">
                
            <div class="">
                <a href="{{ route('home') }}" class="text-layout {{ Request::is('home') ? 'font-bold' : '' }}">Home</a>
                <a href="{{ route('productos') }}" class="text-layout {{ Request::is('productos') ? 'font-bold' : '' }}">Productos</a>
                <a href="{{ route('ubicacion') }}" class="text-layout {{ Request::is('donde-comprar') ? 'font-bold' : '' }}">Donde comprar</a>
                <a href="{{ route('recetas') }}" class="text-layout {{ Request::is('recetas') ? 'font-bold' : '' }}">Recetas</a>
                <a href="{{ route('nosotros') }}" class="text-layout {{ Request::is('nosotros') ? 'font-bold' : '' }}">Nosotros</a>
                <a href="{{ route('contacto') }}" class="text-layout {{ Request::is('contacto') ? 'font-bold' : '' }}">Contacto</a>
            </div>
            <div class="">
                <button class="btn-layout flex justify-center items-center mx-auto">
                    Ingresar 
                    <img src="assets/img/candado.png" alt="">
                </button>
            </div>
        </div>
    </nav>

    <!-- Contenido -->

    <div>
        @yield('content')
    </div>

    <!-- footer -->

    <footer class="footer-layout flex flex-col justify-between">
    
        <div class="h-full flex justify-between  text-black  ">
            <div class="content-center">
                <h1>nikitos</h1>
                <div class="flex">
                    <p>face</p>
                    <p>inst</p>
                </div> 
            </div>
            <div class="content-center">
                <ul>
                    <h2>Secciones</h2>
                    <div class="flex">
                        <div>
                            <li><a href="">s</a></li>
                            <li><a href="">s</a></li>
                            <li><a href="">s</a></li>
                            <li><a href="">s</a></li>
                        </div>
                        <div>
                            <li><a href="">s</a></li>
                            <li><a href="">s</a></li>
                            <li><a href="">s</a></li>
                            <li><a href="">s</a></li>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="content-center">
                <h1>Suscribete</h1>
                <h2>mandar correo</h2>
            </div>
            <div class="content-center">
                <h1>Contacto</h1>
                <a href="">ubi</a>
                <p>telefono</p>
                <p>mail</p>
                <p>horas</p>
            </div>
        </div>
        <div class="copy flex justify-between">
           <p> © Copyright &copy;<?php echo date("Y");?> Nilitos Snacks. Todos los derechos reservados</p>
           <p>By <span>Osole</span></p>
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