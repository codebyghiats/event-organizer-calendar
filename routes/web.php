<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\ProposalController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

    Route::middleware(['auth'])->get('/dashboard', function () {
        $userFamilies = auth()->user()->families()->withPivot('role')->get();
        return view('dashboard', compact('userFamilies'));
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Unit / Family Management
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::post('/families', [FamilyController::class, 'store'])->name('families.store');
    Route::get('/join-family/{token}', [FamilyController::class, 'joinByToken'])->name('families.join');
    
    Route::post('/families/{family}/approve-all', [FamilyMemberController::class, 'approveAll'])
        ->name('families.approveAll');
});

/*
|--------------------------------------------------------------------------
| Calendar
|--------------------------------------------------------------------------
*/

Route::prefix('calendar')
    ->controller(CalendarController::class)
    ->group(function () {
        // Calendar User
        Route::get('/{family?}', 'calendarUser')->name('calendarUser');
        // Calendar Organisasi
        Route::get('/organisasi/{family?}', 'calendarOrganisasi')->name('calendarOrganisasi');
        // Admin
        Route::get('/admin/calendar', 'index')->name('calendarAdmin')->middleware('auth');
});

/*
|--------------------------------------------------------------------------
| Events & Categories
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::resource('events', EventController::class)->except(['index', 'create', 'show', 'edit']);
    
    // Categories
    Route::get('/family/{family}/categories', [EventCategoryController::class, 'index'])->name('categories.index');
    Route::post('/family/{family}/categories', [EventCategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{category}', [EventCategoryController::class, 'destroy'])->name('categories.destroy');
});

/*
|--------------------------------------------------------------------------
| Proposal System 2.0 (The Rebuild)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('proposals')->name('proposals.')->group(function () {
    // Untuk OSIS / MPK
    Route::get('/my', [ProposalController::class, 'userIndex'])->name('user');
    
    // Untuk Guru / Pembina
    Route::get('/review/{family}', [ProposalController::class, 'adminIndex'])->name('admin');
    
    // Umum
    Route::get('/{event}', [ProposalController::class, 'show'])->name('show');
    Route::post('/{event}/approve', [ProposalController::class, 'approve'])->name('approve');
    Route::post('/{event}/reject', [ProposalController::class, 'reject'])->name('reject');
});