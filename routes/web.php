<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\KantinController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TambahanitemController;

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
    return view('welcome');
});

Auth::routes();

Route::prefix('home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/kantin', [HomeController::class, 'kantin'])->name('kantin');
    Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
    Route::get('/transaksi/{id}', [HomeController::class, 'transaksi'])->name('transaksi');
    Route::post('/transaksi/store/{id}', [HomeController::class, 'trstore'])->name('transaksi.store');
    Route::get('/kantin-detail/{id}', [HomeController::class, 'kantindetail'])->name('kantindetail');
    Route::get('/user-detail/{id}', [HomeController::class, 'userdetail'])->name('userdetail');

});
Route::prefix('owner')->group(function () {
    Route::get('/', [OwnerController::class, 'index'])->name('owner.index');
    Route::get('/setting', [OwnerController::class, 'setting'])->name('owner.setting');
    Route::put('/setting/update', [OwnerController::class, 'update'])->name('owner.update');
    Route::get('/food', [PostController::class, 'index'])->name('post.food');
    Route::post('/food/store', [PostController::class, 'store'])->name('post.food.store');
    Route::post('/food/status/{id}', [PostController::class, 'status'])->name('post.food.status');
    Route::get('/food/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
    Route::get('/food/edit/{id}', [PostController::class, 'edit'])->name('post.food.edit');
    Route::patch('/statusupdate/{id}', [OwnerController::class, 'statusupdate'])->name('transaksi.status.update');
    Route::get('/user-detail/{id}', [HomeController::class, 'userdetail'])->name('userdetail');
    Route::get('/food/tambahitem/{id}', [OwnerController::class, 'tambahitem'])->name('food.tambahitem');
    Route::post('/food/tambahitem/store', [TambahanitemController::class, 'store'])->name('food.tambahitem.store');
    Route::get('/food/tambahitem/delete/{id}', [TambahanitemController::class, 'destroy'])->name('item.delete');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/ruangan', [AdminController::class, 'ruangan'])->name('admin.ruangan');
    Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
    Route::post('/category/tambah', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/category/update/{id}', [CategoryController::class, 'update'])->name('category.edit.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::post('/ruangan/tambah', [RuanganController::class, 'store'])->name('ruangan.store');
    Route::get('/ruangan/edit/{id}', [RuanganController::class, 'edit'])->name('ruangan.edit');
    Route::patch('/ruangan/update/{id}', [RuanganController::class, 'update'])->name('ruangan.edit.update');
    Route::get('/ruangan/delete/{id}', [RuanganController::class, 'destroy'])->name('ruangan.delete');
});
