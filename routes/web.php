<?php

use App\Http\Controllers\DonorController;
use App\Http\Controllers\TranfusiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankDarahController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

// Menambahkan route default untuk mengarahkan ke /user/home
Route::get('/', function () {
    return redirect('/user/home');
});

// Grup route untuk user
Route::prefix('user')->group(function () {
    Route::get('/home', [BerandaController::class, 'index'])->name('user.home');
    Route::get('/pelayanan', [BerandaController::class, 'pelayanan']);
    Route::get('/tentang_kami', [BerandaController::class, 'tentang_kami']);

    // Hanya pengguna yang telah login yang dapat mengakses rute ini
    Route::middleware('auth')->group(function () {
        Route::get('/regist/donor', [DonorController::class, 'index_regist_donor'])->name('index_regist_donor');
        Route::post('/regist/donor', [DonorController::class, 'store_regist_donor'])->name('store_regist_donor');

        Route::get('/regist/tranfusi', [TranfusiController::class, 'index_regist_tranfusi'])->name('index_regist_tranfusi');
        Route::post('/regist/tranfusi', [TranfusiController::class, 'store_regist_tranfusi'])->name('store_regist_tranfusi');

        Route::get('/riwayat/donor', [BerandaController::class, 'riwayat_donor'])->name('riwayat_donor');
        Route::get('/riwayat/tranfusi', [BerandaController::class, 'riwayat_tranfusi'])->name('riwayat_tranfusi');
    });
});

// Grup route untuk admin dengan middleware auth
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/bank_darah', [BankDarahController::class, 'index']);
        Route::resource('bank_darah', BankDarahController::class);
        Route::get('/dokter', [DokterController::class, 'index']);
        Route::resource('dokter', DokterController::class);
        Route::get('/data_admin', [AdminController::class, 'indexAdmin'])->name('admin.data_admin');
        Route::get('/data_admin/create', [AdminController::class, 'createAdmin'])->name('admin.create');
        Route::post('/data_admin', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/profile', [AdminController::class, 'index'])->name('admin.profile');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/profile/update-password', [AdminController::class, 'updatePassword'])->name('admin.profile.update-password');

        Route::get('/pendonor', [DonorController::class, 'index_admin_pendonor'])->name('index_admin_pendonor');
        Route::patch('/pendonor', [DonorController::class, 'input_doctor'])->name('input_doctor');
        Route::patch('/pendonor/{id}', [DonorController::class, 'input_doctor'])->name('input_doctor');
        Route::patch('/admin/update-donor/{id}', [DonorController::class, 'input_doctor'])->name('update_donor');
        Route::delete('/admin/delete-donor/{id}', [DonorController::class, 'delete_donor'])->name('delete_donor');
        Route::patch('/admin/update-tranfusi/{id}', [TranfusiController::class, 'input_doctor'])->name('update_tranfusi');
        Route::delete('/admin/delete-tranfusi/{id}', [TranfusiController::class, 'delete_tranfusi'])->name('delete_tranfusi');

        Route::get('/penerima', [TranfusiController::class, 'index_admin_tranfusi'])->name('index_admin_tranfusi');

        // Route untuk menampilkan view admin/profile/index tanpa controller
        // Route::view('/profile', 'admin.profile.index');
    });
});
// Rute autentikasi
Auth::routes();

// Rute default setelah login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
