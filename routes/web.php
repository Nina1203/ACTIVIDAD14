<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    
    '/notes' => NoteController::class

]);

Route::resources([
    
    '/categories' => CategoryController::class

]);