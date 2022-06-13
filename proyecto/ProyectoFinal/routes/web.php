<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriticoController;
use App\Http\Controllers\OtrosController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\RestauranteController;

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

Route::get('/', function () {
    return view('welcome');
});


//CRITICOS
//PERFIL
Route::get('/perfilview/{id}', [CriticoController::class, "getCurrentUser"])->middleware("auth");
Route::get('/perfil/{id}', [CriticoController::class, "getPerfil"])->middleware("auth");
Route::get('/perfiledit', [CriticoController::class, "getEditProfileView"])->middleware("auth");
Route::get('/perfilcomplete/{id}', [CriticoController::class, "getFullUserInfo"])->middleware("auth");
Route::put("/perfil", [CriticoController::class, "updateProfile"])->middleware("auth");
Route::delete("/perfil/{id}", [CriticoController::class, "deleteCritico"])->middleware("auth");
//OTROS
Route::get('/criticos_view', [CriticoController::class, "getListCritico"]);
Route::get('/criticos', [CriticoController::class, "getCriticos"]);
Route::get('/critico_info_view/{id}', [CriticoController::class, "getCriticoInfoView"]);
Route::get('/criticos/{id}', [CriticoController::class, "getCrticoById"]);
Route::get('/perfiles', [CriticoController::class, "getPerfiles"]);
Route::get('/', [OtrosController::class, "getInicio"]);
//Route::get('/register', [OtrosController::class, "getRegisterForm"]);


//ARTICULOS VIEWS

Route::get('/articulofullview/{id}', [ArticuloController::class, "getArticuloView"]);
Route::get('/articulonew', [ArticuloController::class, "newView"])->middleware("auth");;
Route::get("/articuloeditview", [ArticuloController::class, "editView"])->middleware("auth");;

//ARTICULOS CRUD
Route::get('/articulos', [ArticuloController::class, "getArticulos"]);
Route::get('/articulos/{id}', [ArticuloController::class, "getArticulosByCriticoID"]);
Route::get('/articulosbyrestaurante/{id}', [ArticuloController::class, "getArticulosByRestauranteID"]);
Route::get('/articulo/{id}', [ArticuloController::class, "getArticuloById"]);
Route::post('/articulo', [ArticuloController::class, "postArticulo"])->middleware("auth");;
Route::put('/articulo', [ArticuloController::class, "updateArticulo"] )->middleware("auth");;
Route::delete('/articulo/{id}', [ArticuloController::class, "deleteArticulo"])->middleware("auth");;


//RESTAURANTES VIEWS
Route::get('/restauranteslistview', [RestauranteController::class, "listView"]);
Route::get('/restaurante/{id}', [RestauranteController::class, "getRestauranteView"]);
Route::get('/restaurantenewview', [RestauranteController::class, "newView"])->middleware("auth");
Route::get('/restauranteeditview', [RestauranteController::class, "editView"])->middleware("auth");

//RESTAURANTES CRUD
Route::get('/restaurantes/{id}', [RestauranteController::class, "getRestauranteByID"]);
Route::get('/restaurantes', [RestauranteController::class, "getAll"]);
Route::post('/restaurantes', [RestauranteController::class, "postRestaurante"])->middleware("auth");
Route::put('/restaurantes', [RestauranteController::class, "updateRestaurante"])->middleware("auth");
Route::delete("/restaurantes/{id}", [RestauranteController::class, "deleteRestaurante"])->middleware("auth");



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
