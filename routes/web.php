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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/actividades', ActividadesController::class);
Route::resource('/reportes', ReportesController::class);
Route::resource('/tareas', TareasController::class);
Route::get('/tareas/create', [TareasController::class, 'create']);
Route::get('/reportes/create', [ReportesController::class, 'create']);
