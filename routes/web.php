<?php

use Illuminate\Support\Facades\Route;
use App\Models\Receta;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use App\Models\Ingrediente;
use App\Models\Preparacion;
use App\Http\Controllers\NikitoUserController;

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

    // Menu Productos
    Route::get('/producto', $controller_path . '\ProductoController@index')->name('pages-producto'); 
    Route::get('/producto/create', $controller_path . '\ProductoController@create')->name('pages-producto-create');
    Route::post('/producto/store', $controller_path . '\ProductoController@store')->name('pages-producto-store');
    Route::get('/producto/show/{producto_id}', $controller_path . '\ProductoController@show')->name('pages-producto-show');
    Route::post('/producto/update', $controller_path . '\ProductoController@update')->name('pages-producto-update');
    Route::get('/producto/destroy/{producto_id}', $controller_path . '\ProductoController@destroy')->name('pages-producto-destroy');
    Route::get('/producto/switch/{producto_id}', $controller_path . '\ProductoController@switch')->name('pages-producto-switch');
    Route::get('/producto/destacado/{producto_id}', $controller_path . '\ProductoController@destacado')->name('pages-producto-destacado');

    // Menu Recetas
    Route::get('/receta', $controller_path . '\RecetaController@index')->name('pages-receta'); 
    Route::get('/recetas/create', $controller_path . '\RecetaController@create')->name('pages-receta-create');
    Route::post('/recetas/store', $controller_path . '\RecetaController@store')->name('pages-receta-store');
    Route::get('/recetas/show/{receta_id}', $controller_path . '\RecetaController@show')->name('pages-receta-show');
    Route::post('/recetas/update', $controller_path . '\RecetaController@update')->name('pages-receta-update');
    Route::get('/recetas/destroy/{receta_id}', $controller_path . '\RecetaController@destroy')->name('pages-receta-destroy');
    Route::get('/recetas/switch/{receta_id}', $controller_path . '\RecetaController@switch')->name('pages-receta-switch');

    // Menu Ingredientes
    Route::get('/ingredientes', $controller_path . '\IngredienteController@index')->name('pages-ingredientes'); 
    Route::get('/ingredientes/create', $controller_path . '\IngredienteController@create')->name('pages-ingredientes-create');
    Route::post('/ingredientes/store', $controller_path . '\IngredienteController@store')->name('pages-ingredientes-store');
    Route::get('/ingredientes/show/{ingrediente_id}', $controller_path . '\IngredienteController@show')->name('pages-ingredientes-show');
    Route::post('/ingredientes/update', $controller_path . '\IngredienteController@update')->name('pages-ingredientes-update');
    Route::get('/ingredientes/destroy/{ingrediente_id}', $controller_path . '\IngredienteController@destroy')->name('pages-ingredientes-destroy');
    Route::get('/ingredientes/switch/{ingrediente_id}', $controller_path . '\IngredienteController@switch')->name('pages-ingredientes-switch');

    // Menu Preparacion
    Route::get('/preparacion', $controller_path . '\PreparacionController@index')->name('pages-preparacion'); 
    Route::get('/preparacion/create', $controller_path . '\PreparacionController@create')->name('pages-preparacion-create');
    Route::post('/preparacion/store', $controller_path . '\PreparacionController@store')->name('pages-preparacion-store');
    Route::get('/preparacion/show/{ingrediente_id}', $controller_path . '\PreparacionController@show')->name('pages-preparacion-show');
    Route::post('/preparacion/update', $controller_path . '\PreparacionController@update')->name('pages-preparacion-update');
    Route::get('/preparacion/destroy/{ingrediente_id}', $controller_path . '\PreparacionController@destroy')->name('pages-preparacion-destroy');
    Route::get('/preparacion/switch/{ingrediente_id}', $controller_path . '\PreparacionController@switch')->name('pages-preparacion-switch');

    // Menu Lista
    Route::get('/lista/show/{lista_id}', $controller_path . '\PdfController@show')->name('pages-listaprecio-show');
    Route::post('/lista/update', $controller_path . '\PdfController@update')->name('pages-listaprecio-update');
    
});


Route::get('/home', function () {
    return view('content.web.home');
})->name('home');

Route::get('/productos', function () {
    return view('content.web.producto');
})->name('productos');

Route::get('/productos/categorias/{id}', function ($id) {
    // Cargar el producto específico junto con el detalleTexto usando el ID
    $categoria=CategoriaProducto::with('productos')->findOrFail($id);
    return view('content.web.producto-ctg', compact('categoria'));
})->name('producto.categoria');

Route::get('/productos/producto/{id}', function ($id) {
    // Cargar el producto específico junto con el detalleTexto usando el ID
    $producto=Producto::with('categoria')->findOrFail($id);
    return view('content.web.producto-detalle', compact('producto'));
})->name('producto.detalle');

Route::get('/donde-comprar', function () {
    return view('content.web.ubicacion');
})->name('ubicacion');

Route::get('/recetas', function () {
    return view('content.web.receta');
})->name('recetas');

Route::get('/recetas/recetas-detalle/{id}', function ($id) {
    // Cargar el producto específico junto con el detalleTexto usando el ID
    $receta =Receta::with('ingredientes','preparacion')->findOrFail($id);
    return view('content.web.receta-detalle', compact('receta'));
})->name('receta.detalle');

Route::get('/nosotros', function () {
    return view('content.web.nosotros');
})->name('nosotros');

Route::get('/contacto', function () {
    return view('content.web.contacto');
})->name('contacto');

Route::get('/historico', function () {
    return view('content.web.historico');
})->name('historico');

Route::get('/pedido', function () {
    $producto=Producto::with('categoria')->get();
    return view('content.web.pedido',compact ('producto'));
})->name('pedido');

Route::get('/lista-precios', function () {
    return view('content.web.lista-precios');
})->name('lista');

// Inicio de sesion 

Route::post('/validar-registro',[NikitoUserController::class,'register'])->name('validar-registro');
Route::post('/inicia-sesion',[NikitoUserController::class,'login'])->name('inicia-sesion');

Route::post('/salir',[NikitoUserController::class,'salir'])->name('salir');
Route::post('/delete/{user_id}',[NikitoUserController::class,'destroy'])->name('delete');



