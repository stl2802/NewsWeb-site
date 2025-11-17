<?php

<<<<<<< HEAD
use App\Http\Controllers\CommentController;
=======
>>>>>>> origin/master
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
<<<<<<< HEAD
| contains the "web" middleware group. Now create.blade.php something great!
|
*/

Route::get('/', [PageController::class, 'index']);

Route::get('/index',[PageController::class, 'index'])
    ->name('index');


Route::get('/{article}/show',[PageController::class,'show'])
    ->name('show');

Route::get('/index_json', [PageController::class, 'index_json'])->name('index_json');
Route::get('/{imageLabaName}/new_json',[ArticlesController::class, 'show_json'])
    ->name('show_json');

Route::get('/about', [PageController::class, 'about'])
    ->name('about');

Route::get('/contact', [PageController::class, 'contact'])
    ->name('contact');


Route::get('/article/create', [ArticlesController::class, 'create'])
    ->middleware('can:create,App\Models\Article')
    ->name('article.create');

Route::post('/articles/}', [ArticlesController::class, 'store'])
    ->middleware('can:create,App\Models\Article')
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

Route::patch('/article/{article}/comment/{comment}', [CommentController::class, 'update'])
    ->middleware('can:update,comment')
    ->name('comment.update');

Route::patch('/comment/{comment}/confirm', [CommentController::class, 'confirm'])
    //->middleware('auth:admin')
    ->name('comment.confirm');

Route::delete('/articles/article/comments/{comment}', [CommentController::class, 'destroy'])
    ->middleware('can:update,comment')
    ->name('comment.delete');

Route::middleware(['auth','can:update,user'])->prefix('/home/profile')->namespace('App\Http\Controllers')->group(function () {
    Route::patch('/{user}/update', 'HomeController@profileUpdate')
        ->name('profile.update');
    Route::patch('/{user}/update/avatar', 'HomeController@profileAvatarUpdate')
        ->name('profile.avatar.update');
});

Route::middleware(['auth', 'admin'])->prefix('/admin')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/index', 'AdminController@index')->name('admin.index');

    Route::get('/users', 'AdminController@users')->name('admin.users');

    Route::get('/articles', 'AdminController@articles')->name('admin.articles');

    Route::get('/comments', 'AdminController@comments')->name('admin.comments');

    Route::get('/logs/download', 'AdminController@logs')->name('admin.logs');

    Route::delete('/user/delete', 'AdminController@deleteUser')->name('admin.deleteUser');
    Route::patch('/user/ban', 'AdminController@banUser')->name('admin.userBan');
    Route::patch('/user/unban', 'AdminController@unbanUser')->name('admin.userUnban');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
=======
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index_json', [PageController::class, 'index_json'])->name('index_json');
Route::get('/{imageLabaName}/new_json',[ArticlesController::class, 'show_json'])->name('show_json');

Route::get('/index',[PageController::class, 'index'])->name('index');
Route::get('/{id}/show',[ArticlesController::class,'show'])->name('show');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
>>>>>>> origin/master
