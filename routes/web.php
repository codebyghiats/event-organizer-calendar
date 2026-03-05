<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FamilyMemberController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

    Route::middleware(['auth'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

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
        Route::get('/', 'calendarUser')
            ->name('calendarUser');

        // Calendar Organisasi
        Route::get('/organisasi', 'calendarOrganisasi')
            ->name('calendarOrganisasi');

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

        Route::get('/calendar', 'index')
            ->name('calendarAdmin');

});


/*
|--------------------------------------------------------------------------
| Family Management
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->controller(FamilyMemberController::class)
    ->group(function () {

        Route::post('/families/{family}/approve-all', 'approveAll')
            ->name('families.approveAll');

});