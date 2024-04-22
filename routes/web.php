<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\welcomeController;
use \App\Http\Controllers\postsController;

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

Route::get('/', [postsController::class, 'showPosts']);
Route::get('/show/{id}', [postsController::class, 'openPost']);
Route::get('/edit/{id}', [postsController::class, 'edit']);
Route::put('/update/{id}', [postsController::class, 'update']);
Route::delete('/delete/{id}', [postsController::class, 'destroy']);
Route::get('/newpost', [postsController::class, 'newPost']);
Route::post('/createpost', [postsController::class, 'createPost']);
Route::get('/category/{id}', [postsController::class, 'showByCategories']);
