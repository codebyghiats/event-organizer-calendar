<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FamilyMemberController;

Route::get('/', [HomeController::class, 'home']);


Route::post('/families/{family}/approve-all', 
    [FamilyMemberController::class, 'approveAll']
)->name('families.approveAll')->middleware('auth');