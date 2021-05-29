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
Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy')->name('perfil.destroy');

