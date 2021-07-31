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

Route::get('/', [App\Http\Controllers\CodeTodoController::class, "codeTodoHome"]);
Route::post('/codetodo/new', [App\Http\Controllers\CodeTodoController::class, "codeTodoNew"]);
Route::post('/codetodo/{codeTodoId}/complete', [App\Http\Controllers\CodeTodoController::class, "codeTodoComplete"]);
Route::post('/codetodo/{codeTodoId}/delete', [App\Http\Controllers\CodeTodoController::class, "codeTodoDelete"]);
Route::post('/codetodo/{codeTodoId}/edit', [App\Http\Controllers\CodeTodoController::class, "codeTodoEdit"]);



