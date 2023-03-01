<?php

use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\User;
use App\Services\NewsLetter;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::post('/newsletter', NewsLetterController::class);

Route::get('/register', [RegisterController::class. 'create']);

Route::get('/post/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin');

Route::post('/admin/posts/', [PostController::class, 'store'])->middleware('admin');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
