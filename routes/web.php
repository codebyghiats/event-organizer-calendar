<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\CalendarController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/calendarAdmin', [CalendarController::class, 'index'])->name('calendarAdmin');
Route::get('/calendar', [CalendarController::class, 'calendarUser'])
     ->name('calendarUser');
Route::get('/calendarOrganisasi', [CalendarController::class, 'calendarOrganisasi']);
Route::post('/families/{family}/approve-all', 
    [FamilyMemberController::class, 'approveAll']
)->name('families.approveAll')->middleware('auth');