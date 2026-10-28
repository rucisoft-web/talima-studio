<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolController;
use App\Support\UserGuide;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::get('/panduan', fn () => view('guide', ['roles' => UserGuide::roles()]))->name('guide');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/schools/create', [SchoolController::class, 'create'])->name('schools.create');
    Route::post('/schools', [SchoolController::class, 'store'])->name('schools.store');
    Route::get('/schools/{school:slug}', [SchoolController::class, 'show'])->name('schools.show');
});
