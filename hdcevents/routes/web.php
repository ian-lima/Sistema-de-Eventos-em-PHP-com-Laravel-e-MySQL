<?php

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

use App\Http\Controllers\EventController;

// Rotas padrões do Laravel

Route::get('/', [EventController::class, 'index']); // index para mostrar todos os registros
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth'); // create para mostrar o formulário de criar com registro no banco
Route::get('/events/{id}', [EventController::class, 'show']); // show para mostrar um dado específico
Route::post('/events', [EventController::class, 'store']); // store para enviar os dados do banco
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth'); // destroy para deletar dados
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth'); // edit para editar dados
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth'); // update para atualizar dados

Route::get('/contact', function () {
  return view('contact');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');
