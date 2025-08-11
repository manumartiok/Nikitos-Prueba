@php
    $banners = App\Models\Banner::first();
    $distribuidores = App\Models\Distribuidor::where('active',1)->get();
    $provincias = $distribuidores->pluck('provincia')->unique()->values();
    $ciudades = $distribuidores->pluck('ciudad')->unique()->values();
@endphp

@extends('layouts.web-layout')
@section('title', 'Donde Comprar')

@section('content')
<!-- Banner -->
<div class="relative w-full h-[406px] overflow-hidden">
    <img src="{{ $banners->ubicacion_foto }}" alt="" class="w-full h-full object-center">
    <div class="absolute inset-0 z-10 flex flex-col justify-center items-center text-white nunitosans text-[50px] font-[600]">
        <h1>{{ $banners->ubicacion_titulo }}</h1>
    </div>
</div>

<!-- Contenido principal -->
<div class="max-w-[1258px] mx-auto py-16 px-[5%] lg:px-[0%] h-full md:h-[780px] flex flex-col md:flex-row gap-4">
    <!-- Filtros y lista -->
    <div class="w-full h-full lg:w-1/3 flex flex-col">
        <div class="flex gap-2 mb-6 w-full">
        <div class="relative flex-1  md:max-w-[190px] text-[16px] text-[#5C5C5C] font-[400]">
            <select id="filtroProvincia" class="appearance-none nunitosans w-full h-[43px] pl-2 pr-8 border rounded-[8px] border-[#DEDEDE] text-base">
            <option value="">Provincia</option>
            @foreach($provincias as $prov)
                <option value="{{ $prov }}">{{ $prov }}</option>
            @endforeach
            </select>
            <i class="fa-solid fa-arrow-down absolute right-2 top-1/2 transform -translate-y-1/2 pointer-events-none text-[#5C5C5C] text-lg"></i>
        </div>

        <div class="relative flex-1  md:max-w-[190px] text-[16px] text-[#5C5C5C] font-[400]">
            <select id="filtroCiudad" class="appearance-none nunitosans w-full h-[43px] pl-2 pr-8 border rounded-[8px] border-[#DEDEDE] text-base">
            <option value="">Ciudad</option>
            @foreach($ciudades as $ciu)
                <option value="{{ $ciu }}">{{ $ciu }}</option>
            @endforeach
            </select>
            <i class="fa-solid fa-arrow-down absolute right-2 top-1/2 transform -translate-y-1/2 pointer-events-none text-[#5C5C5C] text-lg"></i>
        </div>

        <button id="btnFiltrar">
            <i class="fa-solid fa-magnifying-glass text-[#FFA221] text-lg"></i>
        </button>
        </div>
        <div id="listaDistribuidores" class="h-full overflow-y-auto border-y border-[#DCDCDC]">
            @foreach($distribuidores as $d)
            <div class="distribuidor-item p-4 border-b cursor-pointer"
                 data-lat="{{ $d->latitud }}"
                 data-lng="{{ $d->longitud }}">
                <h2 class="font-medium">{{ $d->nombre }}</h2>
                <p class="text-sm">{{ $d->ciudad }}, {{ $d->provincia }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Mapa -->
    <div class="w-full h-full  lg:w-2/3">
        <div id="map" class="w-full h-full min-h-[300px] rounded border"></div>
    </div>
</div>

<script>
    const distribuidores = @json($distribuidores);
    let map, markers = [];

    function initMap() {
        // Estilo gris
        const grayStyle = [
            { elementType: 'geometry', stylers: [{ color: '#f5f5f5' }] },
            { elementType: 'labels.icon', stylers: [{ visibility: 'off' }] },
            { elementType: 'labels.text.fill', stylers: [{ color: '#616161' }] },
            { elementType: 'labels.text.stroke', stylers: [{ color: '#f5f5f5' }] },
            { featureType: 'administrative.land_parcel', elementType: 'labels.text.fill', stylers: [{ color: '#bdbdbd' }] },
            { featureType: 'poi', elementType: 'geometry', stylers: [{ color: '#eeeeee' }] },
            { featureType: 'poi', elementType: 'labels.text.fill', stylers: [{ color: '#757575' }] },
            { featureType: 'poi.park', elementType: 'geometry', stylers: [{ color: '#e5e5e5' }] },
            { featureType: 'poi.park', elementType: 'labels.text.fill', stylers: [{ color: '#9e9e9e' }] },
            { featureType: 'road', elementType: 'geometry', stylers: [{ color: '#ffffff' }] },
            { featureType: 'road.arterial', elementType: 'labels.text.fill', stylers: [{ color: '#757575' }] },
            { featureType: 'road.highway', elementType: 'geometry', stylers: [{ color: '#dadada' }] },
            { featureType: 'road.highway', elementType: 'labels.text.fill', stylers: [{ color: '#616161' }] },
            { featureType: 'road.local', elementType: 'labels.text.fill', stylers: [{ color: '#9e9e9e' }] },
            { featureType: 'transit.line', elementType: 'geometry', stylers: [{ color: '#e5e5e5' }] },
            { featureType: 'transit.station', elementType: 'geometry', stylers: [{ color: '#eeeeee' }] },
            { featureType: 'water', elementType: 'geometry', stylers: [{ color: '#c9c9c9' }] },
            { featureType: 'water', elementType: 'labels.text.fill', stylers: [{ color: '#9e9e9e' }] }
        ];

        // Inicializa el mapa
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: { lat: -38.4161, lng: -63.6167 },
            styles: grayStyle
        });

        renderMarkers(distribuidores);
        renderLista(distribuidores);
    }

    function renderMarkers(data) {
        // Limpia marcadores
        markers.forEach(m => m.setMap(null));
        markers = [];

        data.forEach((d, i) => {
            const pos = { lat: parseFloat(d.latitud), lng: parseFloat(d.longitud) };

            const marker = new google.maps.Marker({
                position: pos,
                map,
                title: d.nombre,
                icon: {
                    url: '/assets/img/Group 3788.png',
                    scaledSize: new google.maps.Size(50, 68),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(25, 68)
                }
            });

            marker.addListener('click', () => {
                map.setCenter(marker.getPosition());
                map.setZoom(14);
                // Podrías agregar un infoWindow aquí si querés
            });

            markers.push(marker);
        });
    }

    function renderLista(data) {
        const lista = document.getElementById('listaDistribuidores');
        lista.innerHTML = ''; // limpiar lista

        if(data.length === 0) {
            lista.innerHTML = '<p class="p-4">No se encontraron distribuidores.</p>';
            return;
        }

        data.forEach(d => {
            const div = document.createElement('div');
            div.className = 'distribuidor-item p-4 border-b cursor-pointer';
            div.setAttribute('data-lat', d.latitud);
            div.setAttribute('data-lng', d.longitud);

            div.innerHTML = `
                <h2 class="font-medium">${d.nombre}</h2>
                <p class="text-sm">${d.ciudad}, ${d.provincia}</p>
            `;

            div.addEventListener('click', () => {
                const pos = { lat: parseFloat(d.latitud), lng: parseFloat(d.longitud) };
                map.setCenter(pos);
                map.setZoom(14);

                // Buscar marcador correspondiente
                const marker = markers.find(m =>
                    m.getPosition().lat() === pos.lat && m.getPosition().lng() === pos.lng
                );
                if (marker) {
                    google.maps.event.trigger(marker, 'click');
                }
            });

            lista.appendChild(div);
        });
    }

    document.getElementById('btnFiltrar').addEventListener('click', () => {
        const prov = document.getElementById('filtroProvincia').value;
        const ciu = document.getElementById('filtroCiudad').value;
        const filtrados = distribuidores.filter(d =>
            (!prov || d.provincia === prov) &&
            (!ciu || d.ciudad === ciu)
        );
        renderMarkers(filtrados);
        renderLista(filtrados);
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZUlidy4Exa3bvZLRh4qgqx4lwlLy6khw&callback=initMap&libraries=geometry,places" async defer></script>

@endsection