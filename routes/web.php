<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/article/{judul}', [DetailArticleController::class, 'index'])->name('show.article');
Route::get('/admin/login', function() {
    return redirect(route('login'));
});

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/home', [DashboardController::class, 'index'])->name('admin.dashboard');
    // article route
    Route::get('/article', [PostsController::class, 'index'])->name('article');
    Route::get('/article/add', [PostsController::class, 'indexStore'])->name('article.create');
    Route::post('/article/add', [PostsController::class, 'store'])->name('article.store');
    Route::get('/article/update/{id}', [PostsController::class, 'indexUpdateArticle'])->name('article.update');
    Route::put('/article/update/{id}', [PostsController::class, 'update'])->name('article.update');
    Route::delete('/article/delete/{id}', [PostsController::class, 'destroy'])->name('article.delete');
    // category route
    Route::get('/category', [KategoriController::class, 'index'])->name('category');
    Route::post('/category/add', [KategoriController::class, 'store'])->name('category.store');
    Route::put('/category/update/{id}', [KategoriController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{id}', [KategoriController::class, 'destroy'])->name('category.delete');
    // profile route
    Route::get('/profile', [UserController::class, 'index'])->name('profile');
    Route::put('/profile/update/{id}', [UserController::class, 'update'])->name('profile.update');

});



