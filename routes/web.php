<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PartnerProfileController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', function() {
    return view('homepage');
})->name('homepage');

Route::get('/user/dashboard', function() {
    return view('user.dashboard');
})->name('user.dashboard');

Route::get('/user/field', [FieldController::class, 'userIndex'])->name('user.field');
Route::get('/user/detail', [FieldController::class, 'userShow'])->name('user.show');
Route::get('/user/review-order', [TransactionController::class, 'userOrder'])->name('user.order');
Route::get('/user/payment', [TransactionController::class, 'userPayment'])->name('user.payment');
Route::post('/user/upload-payment', [TransactionController::class, 'userUpload'])->name('user.upload');
Route::get('/user/order-completed', [TransactionController::class, 'userCompleted'])->name('user.completed');



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
    Route::get('/register', [PartnerController::class, 'register'])->name('partner.register');
    Route::post('/register/store', [PartnerController::class, 'store'])->name('partner.register.store');
    

    Route::middleware(['partner'])->group(function() {
        Route::controller(PartnerController::class)->group(function() {
            Route::get('/dashboard', 'dashboard')->name('partner.dashboard');
            Route::get('/logout', 'logout')->name('partner.logout');
        });

        Route::controller(PartnerProfileController::class)->group(function() {
            Route::get('/edit', 'edit')->name('partner.edit');
            Route::patch('/edit/update', 'update')->name('partner.update');
        });

        Route::controller(FieldController::class)->group(function() {	
            Route::get('/field', 'index')->name('field.index');
            Route::get('/create', 'create')->name('field.create');
            Route::post('/field/store', 'store')->name('field.store');
            Route::get('/detail/{id}', 'show')->name('field.show');
            Route::get('/edit/{id}', 'edit')->name('field.edit');
            Route::put('/update/{id}', 'update')->name('field.update');
            Route::delete('/destroy/{id}','destroy')->name('field.destroy'); 
        });

        Route::controller(TransactionController::class)->group(function() {
            Route::get('/transaction', 'index')->name('transaction.index');
        });
    });
});

// Route::controller(VenueController::class)->group(function() {
//     Route::get('/venue', 'index')->name('venue.index');
//     Route::get('/create', 'create')->name('venue.create');
//     Route::post('/venue/store', 'store')->name('venue.store');
//     Route::get('/detail/{id}', 'show')->name('venue.show');
//     Route::get('/edit/{id}', 'edit')->name('venue.edit');
//     Route::put('/venue', 'index')->name('venue.index');
//     Route::delete('/destroy/{id}', 'destroy')->name('venue.destroy');
// });










Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
