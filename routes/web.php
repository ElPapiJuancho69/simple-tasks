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


Route::resource('/tareas', TareasController::class);
Route::get('/tareas/create', [TareasController::class, 'create']);
Route::get('/tareas/show/{id}',[TareasController::class, 'show']);
Route::get('/tareas/edit/{id}',[TareasController::class, 'edit']);
Route::put('/tareas/{id}',[TareasController::class, 'update']);
Route::delete('/tareas/delete/{id}',[TareasController::class, 'destroy']);


Route::get('/reportes/create', [ReportesController::class, 'create']);
Route::get('/reportes/show/{id}',[ReportesController::class, 'show']);
Route::get('/reportes/edit/{id}',[ReportesController::class, 'edit']);
Route::put('/reportes/{id}',[ReportesController::class, 'update']);
Route::delete('/reportes/delete/{id}',[ReportesController::class, 'destroy']);
Route::resource('/reportes', ReportesController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
