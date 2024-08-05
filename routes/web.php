<?php
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('client.layouts.master');
// });

//client
// Route::middleware(['auth', 'is_member'])->group(function () {
    Route::get('/', [Postcontroller::class, 'index'])->name('home');
    Route::get('/chitiet/{id}', [Postcontroller::class, 'chitiet'])->name('tin.chitiet');
    Route::get('/category/{id}', [Postcontroller::class, 'postsInCategory'])->name('tin.category');
    Route::get('/gioithieu', [Postcontroller::class, 'gioithieu'])->name('gioithieu');
    Route::get('/lienhe', [Postcontroller::class, 'lienhe'])->name('lienhe');
    Route::post('/search', [Postcontroller::class, 'search'])->name('search');
    Route::post('/comment', [Postcontroller::class, 'comment'])->name('comment');
// });


//admin
Route::middleware(['auth', 'is_admin'])->group(function(){
    Route::resource('users',UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', App\Http\Controllers\Admin\Postcontroller::class);
    Route::resource('comments', App\Http\Controllers\Admin\CommentController::class)->only('index', 'destroy');
});


//Auth
Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::get('/register', function () {
    return view('auth.register');
})->name('auth.register');

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

