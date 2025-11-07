<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticlesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create.blade.php something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index_json', [PageController::class, 'index_json'])->name('index_json');
Route::get('/{imageLabaName}/new_json',[ArticlesController::class, 'show_json'])->name('show_json');

Route::get('/index',[PageController::class, 'index'])->name('index');
Route::get('/{article}/show',[ArticlesController::class,'show'])->name('show');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');


Route::get('/article/create.blade.php', [ArticlesController::class, 'create'])
    ->name('article.create');

Route::post('/articles/}', [ArticlesController::class, 'store'])
    ->name('article.store');

Route::get('/article/{article}/edit', [ArticlesController::class, 'edit'])
    ->middleware('can:update,article')
    ->name('article.edit');

Route::patch('/articles/{article}', [ArticlesController::class, 'update'])
    ->middleware('can:update,article')
    ->name('article.update');

Route::delete('/articles/{article}', [ArticlesController::class, 'delete'])
    ->middleware('can:delete,article')
    ->name('article.delete');

Route::post('/articles/{article}/comments/',[CommentController::class, 'store'])
    ->name('comment.store');

Route::get('/articles/article/comments/{comment}/edit',[CommentController::class, 'edit'])
    ->middleware('can:update,comment')
    ->name('comment.edit');

Route::patch('/articles/article/comments/{comment}', [CommentController::class, 'update'])
    ->middleware('can:update,comment')
    ->name('comment.update');

Route::delete('/articles/article/comments/{comment}', [CommentController::class, 'destroy'])
    ->middleware('can:update,comment')
    ->name('comment.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
