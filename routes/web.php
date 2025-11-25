<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'home']);

Route::get('/home', [HomeController::class, 'home']);
Route::get('/about/{nama}', [HomeController::class, 'about']);

Route::get('/produk', [ProdukController::class, 'cari_produk']);
Route::get('/produk/detail/{nama}', [ProdukController::class, 'detail']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return view('dashboard.admin');
})->middleware(['auth', 'role:admin']);

Route::get('/user', function () {
    return view('dashboard.user');
})->middleware(['auth', 'role:user']);

Route::get('/staff', function () {
    return view('dashboard.staff');
})->middleware(['auth', 'role:staff']);

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/produk', [ProdukController::class, 'indexStaff'])->name('staff.produk');
    Route::get('/staff/produk/create', [ProdukController::class, 'create'])->name('staff.produk.create');
    Route::post('/staff/produk/store', [ProdukController::class, 'store'])->name('staff.produk.store');
    Route::get('/staff/produk/edit/{id}', [ProdukController::class, 'edit'])->name('staff.produk.edit');
    Route::put('/staff/produk/update/{id}', [ProdukController::class, 'update'])->name('staff.produk.update');
    Route::delete('/staff/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('staff.produk.delete');
});

require __DIR__.'/auth.php';
