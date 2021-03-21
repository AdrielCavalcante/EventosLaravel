<?php

use App\Http\Controllers\EventosControle;
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

Route::get('/',[EventosControle::class, 'index']);

Route::get('/eventos/create',[EventosControle::class, 'create'])->middleware('auth');

Route::get('/eventos/{id}',[EventosControle::class, 'show']);

Route::post('/eventos', [EventosControle::class, 'store']);

Route::delete('/eventos/{id}', [EventosControle::class, 'destroy'])->middleware('auth');

Route::get('/eventos/edit/{id}', [EventosControle::class, 'edit'])->middleware('auth');

Route::put('eventos/update/{id}', [EventosControle::class, 'update'])->middleware('auth');

Route::get('/contato', function(){
    return view('contato');
});

Route::get('/dashboard',[EventosControle::class, 'dashboard'])->middleware('auth');

Route::post('/eventos/join/{id}', [EventosControle::class, 'joinEvento'])->middleware('auth');

Route::delete('/eventos/leave/{id}', [EventosControle::class, 'leaveEvento'])->middleware('auth');