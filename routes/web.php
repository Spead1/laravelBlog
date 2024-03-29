<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;

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

Route::get("/", [MainController::class, 'home'])->name('home');

Route::get('/articles', [MainController::class,'index'])->name('articles');

Route::get('/articles/{article:slug}', [MainController::class, 'show'])->name('article');

Auth::routes();

Route::get('/admin/articles', [ArticleController::class,'index'])->middleware('admin')->name('articles.index');

Route::get('/admin/articles/create', [ArticleController::class, 'create'])->middleware('admin')->name('articles.create');

Route::post('/admin/articles/store', [ArticleController::class,'store'])->middleware('admin')->name('articles.store');

Route::delete('/admin/articles/{article:id}/delete', [ArticleController::class,'delete'])->middleware('admin')->name('articles.delete');

Route::get( '/admin/articles/{article:id}/edit', [ArticleController::class,'edit'])->middleware('admin')->name('articles.edit');

Route::put( '/admin/articles/{article:id}/update', [ArticleController::class,'update'])->middleware('admin')->name('articles.update');
