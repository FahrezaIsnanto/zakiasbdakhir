<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\HistoriController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('add', [AdminController::class, 'create'])->name('admin.create');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
});

Route::prefix('obat')->group(function () {
    Route::get('/', [ObatController::class, 'index'])->name('obat.index');
    Route::get('add', [ObatController::class, 'create'])->name('obat.create');
    Route::post('store', [ObatController::class, 'store'])->name('obat.store');
    Route::get('edit/{id}', [ObatController::class, 'edit'])->name('obat.edit');
    Route::post('update/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::post('delete/{id}', [ObatController::class, 'delete'])->name('obat.delete');
});

Route::prefix('histori')->group(function () {
    Route::get('/', [HistoriController::class, 'index'])->name('histori.index');
    Route::get('add', [HistoriController::class, 'create'])->name('histori.create');
    Route::post('store', [HistoriController::class, 'store'])->name('histori.store');
    Route::get('edit/{id}', [HistoriController::class, 'edit'])->name('histori.edit');
    Route::post('update/{id}', [HistoriController::class, 'update'])->name('histori.update');
    Route::post('delete/{id}', [HistoriController::class, 'delete'])->name('histori.delete');
});




// Route::get('/', [AdminController::class, 'index'])->name('admin.index');
// Route::get('add', [AdminController::class, 'create'])->name('admin.create');
// Route::post('store', [AdminController::class, 'store'])->name('admin.store');
// Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
// Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
// Route::post('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');


// Route::resource('obat', ObatController::class);
// Route::get('add', [ObatController::class, 'index'])->name('obat.index');



// Route::resource('histori', HistoriController::class);
// Route::resource('add', [HistoriController::class])->name('histori.create');

