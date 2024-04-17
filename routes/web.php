<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

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
//ARTICLES
Route::get("/", [MainController::class, 'home'])->name('home');

Route::get('/articles', [MainController::class,'index'])->name('articles');

Route::get('/articles/{article:slug}', [MainController::class, 'show'])->name('article');

//COMMENTS
Route::get('/articles/{article:slug}/comments', [CommentController::class,'index'])->name('comments.index');

Route::get('/articles/{article:slug}/comments/create', [CommentController::class, 'create'])->name('comments.create');

Route::post('/articles/{article:slug}/comments/store', [CommentController::class, 'store'])->name('comments.store');

Route::get('/articles/{article:slug}/comments/count', [MainController::class, 'countComments'])->name('comments.count');

//AUTH
Auth::routes();


//ADMIN
Route::get('/admin/articles', [ArticleController::class,'index'])->middleware('admin')->name('articles.index');

Route::get('/admin/users', [UserController::class, 'index'])->middleware('admin')->name('users.index');

Route::get('/admin/articles/create', [ArticleController::class, 'create'])->middleware('admin')->name('articles.create');

Route::post('/admin/articles/store', [ArticleController::class,'store'])->middleware('admin')->name('articles.store');

Route::delete('/admin/articles/{article:id}/delete', [ArticleController::class,'delete'])->middleware('admin')->name('articles.delete');

Route::get( '/admin/articles/{article:id}/edit', [ArticleController::class,'edit'])->middleware('admin')->name('articles.edit');

Route::get( '/admin/users/{user:id}/edit', [UserController::class,'edit'])->middleware('admin')->name('users.edit');

Route::delete( '/admin/users/{user:id}/delete', [UserController::class,'delete'])->middleware('admin')->name('users.delete');

Route::put( '/admin/articles/{article:id}/update', [ArticleController::class,'update'])->middleware('admin')->name('articles.update');

Route::put( '/admin/users/{user:id}/update', [UserController::class,'update'])->middleware('admin')->name('users.update');
