<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/',[TodoController::class, 'index'])->name('todos.index');
Route::get('/Todos/create',[TodoController::class, 'create'])->name('todos.create');
Route::get('/Todos/{todo}',[TodoController::class, 'show'])->name('todos.show');
Route::post('/Todos',[TodoController::class, 'store'])->name('todos.store');
Route::get('/Todos/{todo}/edit',[TodoController::class, 'edit'])->name('todos.edit');
Route::put('/Todos/{todo}',[TodoController::class, 'update'])->name('todos.update');
Route::delete('/Todos/{todo}',[TodoController::class, 'delete'])->name('todos.delete');
Route::get('/Todos/{todo}/complete',[TodoController::class, 'complete'])->name('todos.complete');

Route::get('/test', function(){

    return Todo::factory()->count(15)->create(); 
});