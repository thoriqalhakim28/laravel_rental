<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TransactionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::prefix('dashboard') -> group(function() {
        Route::get('/transaksi', [TransactionController::class, 'index']) -> name('transaksi');
        Route::get('/transaksiTambah', [TransactionController::class, 'create']) -> name('tambahTransaksi');
        Route::get('/transaksiKembali/{id}', [TransactionController::class, 'edit']) -> name('editTranskasi');
        Route::post('/transaksiStore', [TransactionController::class, 'store']) -> name('simpanTransaksi');
        Route::post('/transaksiUpdate', [TransactionController::class, 'update']) -> name('updateTransaksi');
        Route::get('/tableTransaksi', [TransactionController::class, 'tableTransaksi']) -> name('tableTransaksi');
    });
    Route::prefix('dashboard') -> group(function() {
        Route::get('/vehicles', [VehicleController::class, 'index']) -> name('kendaraan');
        Route::get('/tableKendaraan', [VehicleController::class, 'tableKendaraan']) -> name('tableKendaraan');
    });
});

require __DIR__.'/auth.php';
