<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/dashboard', function() {
//     return view('partner/dashboard');
// });

Route::get('/billing', function() {
    return view('partner/billing');
});

Route::get('/tables', function() {
    return view('partner/tables');
});

Route::prefix('admin')->group(function() {
    Route::get('/login', [AdminController::class, 'index'])->name('admin.login_from');
    Route::post('/login/owner', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('admin');
    Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/register/store', [AdminController::class, 'store'])->name('admin.register.store');
});

Route::prefix('partner')->group(function() {
    Route::get('/login', [PartnerController::class, 'index'])->name('partner.login_from');
    Route::post('/login/owner', [PartnerController::class, 'login'])->name('partner.login');
    Route::get('/dashboard', [PartnerController::class, 'dashboard'])->name('partner.dashboard')->middleware('partner');
    Route::get('/logout', [PartnerController::class, 'logout'])->name('partner.logout')->middleware('partner');
    Route::get('/register', [PartnerController::class, 'register'])->name('partner.register');
    Route::post('/register/store', [PartnerController::class, 'store'])->name('partner.register.store');

    Route::controller(FieldController::class)->group(function () {	
        Route::get('/field', 'index')->name('field.index');
        Route::post('/field_create', 'store')->name('store_field.store');
        Route::get('/detail/{id}', 'show')->name('detail_field.show');
        Route::get('/edit/{id}', 'edit')->name('edit_field.edit');
        Route::put('/update/{id}', 'update')->name('field_update.update');
        Route::delete('/destroy/{id}','destroy')->name('field_destroy.destroy');
        
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
