<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/posts', [ PostController::class, 'index'] )->name('post.index');
Route::get('/posts/create', [ PostController::class, 'create'] )->name('post.create');
Route::post('/posts', [ PostController::class, 'store'] )->name('post.store');
Route::get('/posts/{post}', [ PostController::class, 'show'] )->name('post.show');
Route::get('/posts/{post}/edit', [ PostController::class, 'edit'] )->name('post.edit');
Route::patch('/posts/{post}', [ PostController::class, 'update' ])->name('post.update');
Route::delete('/posts/{post}', [ PostController::class, 'destroy' ])->name('post.delete');
Route::get('/posts/first_or_create', [ PostController::class, 'firstOrCreate' ]);
Route::get('/posts/update_or_create', [ PostController::class, 'updateOrCreate' ]);

Route::get('/contacts', [ ContactController::class, 'index' ])->name('contact.index');

Route::get('/', [ HomeController::class, 'index'])->name('home');
