<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';

    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-');
    Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

    // Menu Layout
    Route::get('/layout/show/{layout_id}', $controller_path . '\LayoutController@show')->name('pages-layout-show');
    Route::post('/layout/update', $controller_path . '\LayoutController@update')->name('pages-layout-update');

    // Menu Banners
    Route::get('/banner/show/{banner_id}', $controller_path . '\BannerController@show')->name('pages-banner-show');
    Route::post('/banner/update', $controller_path . '\BannerController@update')->name('pages-banner-update');

    // Menu Home
    Route::get('/homes/show/{home_id}', $controller_path . '\HomeController@show')->name('pages-home-show');
    Route::post('/home/update', $controller_path . '\HomeController@update')->name('pages-home-update');

    // Menu Nosotros
    Route::get('/nosotros/show/{nosotros_id}', $controller_path . '\NosotroController@show')->name('pages-nosotros-show');
    Route::post('/nosotros/update', $controller_path . '\NosotroController@update')->name('pages-nosotros-update');

    // Menu Contacto
    Route::get('/contacto/show/{contacto_id}', $controller_path . '\ContactoController@show')->name('pages-contacto-show');
    Route::post('/contacto/update', $controller_path . '\ContactoController@update')->name('pages-contacto-update');

    // Menu Categorias
    Route::get('/categoria', $controller_path . '\CategoriaProductoController@index')->name('pages-categoria'); 
    Route::get('/categoria/create', $controller_path . '\CategoriaProductoController@create')->name('pages-categoria-create');
    Route::post('/categoria/store', $controller_path . '\CategoriaProductoController@store')->name('pages-categoria-store');
    Route::get('/categoria/show/{categoria_id}', $controller_path . '\CategoriaProductoController@show')->name('pages-categoria-show');
    Route::post('/categoria/update', $controller_path . '\CategoriaProductoController@update')->name('pages-categoria-update');
    Route::get('/categoria/destroy/{categoria_id}', $controller_path . '\CategoriaProductoController@destroy')->name('pages-categoria-destroy');
    Route::get('/categoria/switch/{categoria_id}', $controller_path . '\CategoriaProductoController@switch')->name('pages-categoria-switch');
    
});


Route::get('/home', function () {
    return view('content.web.home');
})->name('home');

Route::get('/productos', function () {
    return view('content.web.producto');
})->name('productos');

Route::get('/donde-comprar', function () {
    return view('content.web.ubicacion');
})->name('ubicacion');

Route::get('/recetas', function () {
    return view('content.web.receta');
})->name('recetas');

Route::get('/nosotros', function () {
    return view('content.web.nosotros');
})->name('nosotros');

Route::get('/contacto', function () {
    return view('content.web.contacto');
})->name('contacto');
