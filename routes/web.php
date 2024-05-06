<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AfirmasiController;
use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\ErrorsController;
use App\Http\Controllers\GagalController;
use App\Http\Controllers\LolosController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PindahanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ZonasiController;
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
//     return view('page siswa.homepage');
// });

Route::get('/', function () {
    return view('siswa.index');
})->middleware(['auth', 'verified'])->name('siswa.index');

// Route::get('/admin', function () {
//     return view('page admin.admin');
// })->middleware(['auth', 'verified'])->name('page admin.homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
    Route::resource('/afirmasi', AfirmasiController::class);
    Route::resource('/prestasi',PrestasiController::class);
    Route::resource('/zonasi',ZonasiController::class);
    Route::resource('/pindahan',PindahanController::class);
    Route::resource('/pengguna',PenggunaController::class);
    //Route::resource('/pengumuman',PengumumanController::class);
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/pengumuman/create', [PengumumanController::class, 'store'])->name('pengumuman.store');
});

Route::group(['middleware' => 'siswa'], function () {
    // Rute khusus siswa
    Route::resource('/siswa',SiswaController::class);
    Route::resource('/errors',ErrorsController::class);
    Route::resource('/lolos',LolosController::class);
    Route::resource('/gagal',GagalController::class);
    //Route::resource('/pengumuman',PengumumanController::class);
    Route::get('/pengumuman/search',[PengumumanController::class,'search'])->name('pengumuman.search');
    Route::get('/pengumuman',[PengumumanController::class,'index'])->name('pengumuman.index');
    Route::get('/afirmasi/create', [AfirmasiController::class, 'create'])->name('afirmasi.create');
    Route::post('/afirmasi/create', [AfirmasiController::class, 'store'])->name('afirmasi.store');
    Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
    Route::post('/prestasi/create', [PrestasiController::class, 'store'])->name('prestasi.store');
    Route::get('/zonasi/create', [ZonasiController::class, 'create'])->name('zonasi.create');
    Route::post('/zonasi/create', [ZonasiController::class, 'store'])->name('zonasi.store');
    Route::get('/pindahan/create', [PindahanController::class, 'create'])->name('pindahan.create');
    Route::post('/pindahan/create', [PindahanController::class, 'store'])->name('pindahan.store');
});

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::resource('/afirmasi', AfirmasiController::class);
//     Route::resource('/prestasi',PrestasiController::class);
//     Route::resource('/zonasi',ZonasiController::class);
//     Route::resource('/pindahan',PindahanController::class);
//     Route::resource('/pengguna',PenggunaController::class);
// });

// Route::middleware(['auth', 'role:siswa'])->group(function () {
//     Route::resource('/siswa',SiswaController::class);
//     Route::get('/afirmasi/create', [AfirmasiController::class, 'create'])->name('afirmasi.create');
//     Route::post('/afirmasi', [AfirmasiController::class, 'store'])->name('afirmasi.store');
//     Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
//     Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');
//     Route::get('/zonasi/create', [ZonasiController::class, 'create'])->name('zonasi.create');
//     Route::post('/zonasi', [ZonasiController::class, 'store'])->name('zonasi.store');
//     Route::get('/pindahan/create', [ZonasiController::class, 'create'])->name('pindahan.create');
//     Route::post('/pindahan', [ZonasiController::class, 'store'])->name('pindahan.store');
// });



Route::get('provinces', [DependantDropdownController::class,'provinces'])->name('provinces');
Route::get('cities', [DependantDropdownController::class,'cities'])->name('cities');
Route::get('districts', [DependantDropdownController::class,'districts'])->name('districts');
Route::get('villages', [DependantDropdownController::class,'villages'])->name('villages');

// Route::get('/data-afirmasi',[AfirmasiController::class,'index'])->name('data-afirmasi.index');
// Route::get('/data-prestasi',[PrestasiController::class,'index'])->name('data-prestasi.index');
// Route::get('/data-zonasi',[ZonasiController::class,'index'])->name('data-zonasi.index');
// Route::get('/data-pindahan',[PindahanController::class,'index'])->name('data-pindahan.index');
// Route::get('/data-pengguna',[PenggunaController::class,'index'])->name('data-pengguna.index');
Route::view('/siswa/403', '/siswa/403')->name('errors.403');




// Route::get('/daftar-afirmasi',[AfirmasiController::class,'create'])->name('daftar-afirmasi.create');
// Route::post('/daftar-afirmasi',[AfirmasiController::class,'store'])->name('daftar-afirmasi.store');
// Route::get('/daftar-prestasi',[PrestasiController::class,'create'])->name('daftar-prestasi.create');
// Route::post('/daftar-prestasi',[PrestasiController::class,'store'])->name('daftar-prestasi.store');
// Route::get('/daftar-zonasi',[ZonasiController::class,'create'])->name('daftar-zonasi.create');
// Route::post('/daftar-zonasi',[ZonasiController::class,'store'])->name('daftar-zonasi.store');
// Route::get('/daftar-pindahan',[PindahanController::class,'create'])->name('daftar-pindahan.create');
// Route::post('/daftar-pindahan',[PindahanController::class,'store'])->name('daftar-pindahan.store');

// Route::resource('/daftar-afirmasi',AfirmasiController::class);
// Route::resource('/daftar-prestasi',PrestasiController::class);
// Route::resource('/daftar-zonasi',ZonasiController::class);
// Route::resource('/daftar-pindahan',PindahanController::class);

Route::get('/pengumuman',[PengumumanController::class,'index'])->name('pengumuman.index');
Route::get('/hasil-pengumuman',[PengumumanController::class,'search'])->name('hasil-pengumuman.search');


require __DIR__.'/auth.php';
