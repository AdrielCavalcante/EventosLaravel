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

Route::get('/eventos/create',[EventosControle::class, 'create']);

Route::get('/eventos/{id}',[EventosControle::class, 'show']);

Route::post('/eventos', [EventosControle::class, 'store']);

Route::get('/contato', function(){
    return view('contato');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
