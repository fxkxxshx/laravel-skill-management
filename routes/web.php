<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SkillController;

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

// カテゴリ
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

// スキル
Route::get('/skills/create', [SkillController::class, 'create'])
    ->name('skills.create');

Route::post('/skills/store', [SkillController::class, 'store'])
    ->name('skills.store');

Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])
    ->name('skills.edit')
    ->where('skill', '[0-9]+');

Route::patch('/skills/{skill}/update', [SkillController::class, 'update'])
    ->name('skills.update')
    ->where('skill', '[0-9]+');

Route::delete('/skills/{skill}/destroy', [SkillController::class, 'destroy'])
    ->name('skills.destroy')
    ->where('skill', '[0-9]+');

Route::patch('/skills/register', [SkillController::class, 'register'])
    ->name('skills.register');
