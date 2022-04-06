<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Category;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/posts/create', [PostController::class, 'create'])->name('postcreate');
Route::post('/posts/create', [PostController::class, 'store'])->name('postcreate');
Route::get('/posts/{id}', [PostController::class, 'view'])->name('posts');
Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::put('/posts/{id}/edit', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);

Route::get('comments/{id}', [CommentController::class, 'index']);
Route::post('comments/{id}', [CommentController::class, 'store']);
Route::get('edit/comments/{id}', [CommentController::class, 'edit']);
Route::put('edit/comments/{id}', [CommentController::class, 'update']);
Route::delete('comments/{id}', [CommentController::class, 'destroy']);


Route::get('/category/create', [CategoryController::class, 'create'])->name('categorycreate');
Route::post('/category/create', [CategoryController::class, 'store'])->name('categorycreate');
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/tag/{name}', [TagController::class, 'index']);

Route::post('post/{id}/like', [LikeController::class, 'store'])->name('post.like');
Route::delete('post/like/{id}/delete', [LikeController::class, 'destroy'])->name('like.delete');



Route::get('/dashboard', function () {
    $category = Category::all();
    return view('dashboard', ['categories' => $category]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
