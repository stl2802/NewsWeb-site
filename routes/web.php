<?php

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
