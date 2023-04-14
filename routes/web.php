<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('index');
});

Route::get('/categories', [CategoryController::class, 'getMainCategories']);
Route::post('/subcategories', [CategoryController::class, 'getSubCategories']);
Route::get('/categories/main', [CategoryController::class, 'getMainCategories'])->name('get-main-categories');
