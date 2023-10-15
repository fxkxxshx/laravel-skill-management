<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [CategoryController::class, 'index'])
    ->name('index');

Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

Route::post('/categories/store', [CategoryController::class, 'store'])
    ->name('categories.store');

Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->name('categories.edit')
    ->where('category', '[0-9]+');

Route::patch('/categories/{category}/update', [CategoryController::class, 'update'])
    ->name('categories.update')
    ->where('category', '[0-9]+');

Route::delete('/categories/{category}/destroy', [CategoryController::class, 'destroy'])
    ->name('categories.destroy')
    ->where('category', '[0-9]+');
