<?php

use App\Http\Controllers\ActividadesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\TareasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('actividades/create',[ActividadesController::class, 'create']);
Route::resource('actividades',ActividadesController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('actividades', [ActividadesController::class, 'index'])->name('actividadesindex');
Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes.index');
Route::get('/tareas', [TareasController::class, 'index'])->name('tareasindex');
