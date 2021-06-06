<?php

use App\Models\Activity;
use App\Models\Game;
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


/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::get('/', function () {
    $activities=Activity::orderby('titulo')->paginate(3, ['*'], 'activities');
    $games=Game::orderby('nombre')->paginate(3, ['*'], 'games');
    return view('dashboard', compact('games', 'activities'));
})->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('games', '\App\Http\Controllers\GameController');
Route::resource('activities', '\App\Http\Controllers\ActivityController');
Route::resource('types', '\App\Http\Controllers\TypeController');
/*
Route::resource('posts', '\App\Http\Controllers\PostController');
Route::resource('categories', '\App\Http\Controllers\CategoryController');
Route::resource('themes', '\App\Http\Controllers\ThemeController');
//para cargar los temas pasandole el id de la categoria
Route::get('/theme/{id}', 'App\Http\Controllers\CategoryController@indexTheme')->name('categories.indexTheme');
//para cargar los post pasandole el id de los temas
Route::get('post/{id}', 'App\Http\Controllers\CategoryController@indexPost')->name('categories.Posts');
*/


Route::get('/nosotros', function () {
    return view('dondeencontrarnos');
})->name('dondeencontrarnos');

Route::get('/fqs', function () {
    return view('preguntasFrecuentes');
})->name('preguntasFrecuentes');



Route::get('/perfil', 'App\Http\Controllers\UserController@index')->name('perfil');

Route::get('/perfil/edit', 'App\Http\Controllers\UserController@edit')->name('perfil.editar');
Route::put('/perfil/{id}','App\Http\Controllers\UserController@update')->name('perfil.update');

Route::get('/perfil2/{id}/edit', 'App\Http\Controllers\UserController@editv2')->name('perfil.editarv2');
Route::put('/perfil2{user}','App\Http\Controllers\UserController@updatev2')->name('perfil.updatev2');

Route::get('/users','App\Http\Controllers\UserController@todos')->name('perfil.todos');
Route::delete('/users/{user}', 'App\Http\Controllers\UserController@destroy')->name('perfil.destroy');
Route::put('/usersH/{user}','App\Http\Controllers\UserController@habilitar')->name('perfil.habilitar');

//RUTAS DEL FORO

//CATEGORY
Route::get('categories', 'App\Http\Controllers\ForoController@indexCategory')->name('foro.indexCategory');
Route::get('categories/create', 'App\Http\Controllers\ForoController@createCategory')->name('foro.createCategory')->middleware('EsSuperAdmin');
Route::post('categories', 'App\Http\Controllers\ForoController@storeCategory')->name('foro.storeCategory')->middleware('EsSuperAdmin');
Route::delete('categories/{category}', 'App\Http\Controllers\ForoController@destroyCategory')->name('foro.destroyCategory')->middleware('EsSuperAdmin');
//THEME
Route::get('themes/{id}', 'App\Http\Controllers\ForoController@indexTheme')->name('foro.indexTheme');
Route::get('themecreador', 'App\Http\Controllers\ForoController@createTheme')->name('foro.createTheme')->middleware('auth', 'verified');
Route::post('themes', 'App\Http\Controllers\ForoController@storeTheme')->name('foro.storeTheme')->middleware('auth', 'verified');
Route::delete('themes/{theme}', 'App\Http\Controllers\ForoController@destroyTheme')->name('foro.destroyTheme')->middleware('auth', 'verified');
//POST
Route::get('posts/{id}', 'App\Http\Controllers\ForoController@indexPost')->name('foro.indexPost');
Route::post('posts', 'App\Http\Controllers\ForoController@storePost')->name('foro.storePost')->middleware('auth', 'verified');
Route::delete('posts/{post}', 'App\Http\Controllers\ForoController@destroyPost')->name('foro.destroyPost')->middleware('auth', 'verified');
