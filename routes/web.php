<?php
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\Postcontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('client.layouts.master');
});

Route::get('/', [Postcontroller::class, 'index'])->name('home');
Route::get('/chitiet/{id}', [Postcontroller::class, 'chitiet'])->name('tin.chitiet');
Route::get('/category/{id}', [Postcontroller::class, 'postsInCategory'])->name('tin.category');
Route::get('/gioithieu', [Postcontroller::class, 'gioithieu'])->name('gioithieu');
Route::get('/lienhe', [Postcontroller::class, 'lienhe'])->name('lienhe');
Route::post('/search', [Postcontroller::class, 'search'])->name('search');
Route::resource('categories', CategoryController::class);

