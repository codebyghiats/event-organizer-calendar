<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Public Pages (Tanpa Auth)
|--------------------------------------------------------------------------
*/
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Public calendar preview
Route::get('/kalender', [CalendarController::class, 'calendarUser'])->name('kalender.public');

/*
|--------------------------------------------------------------------------
| Auth Routes (Guest Only)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Butuh Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::prefix('calendar')->controller(CalendarController::class)->group(function () {
        Route::get('/', 'calendarUser')->name('calendarUser');
        Route::get('/organisasi', 'calendarOrganisasi')->name('calendarOrganisasi');
    });
    
    Route::controller(FamilyMemberController::class)->group(function () {
        Route::post('/families/{family}/approve-all', 'approveAll')->name('families.approveAll');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth'])
    ->controller(CalendarController::class)
    ->group(function () {
        Route::get('/calendar', 'index')->name('calendarAdmin');
});