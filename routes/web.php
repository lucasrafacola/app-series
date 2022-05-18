<?php

use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
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

Route::get('/', function () {
    return to_route('series.index');
});

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/criar', 'create')->name('series.create');
    Route::post('/series/salvar', 'store')->name('series.store');
    Route::delete('/series/exclui/{serie}', 'destroy')->name('series.destroy')->whereNumber('serie');
    Route::get('/series/edita/{serie}', 'edit')->name('series.edit')->whereNumber('serie');
    Route::put('/series/atualiza/{serie}', 'update')->name('series.update')->whereNumber('serie');
});

Route::get('/series/{serie}/temporadas', [TemporadasController::class, 'index'])->name('temporadas.index');
