<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Contestant\Index as ContestantIndex;
use App\Livewire\Judge\Index as JudgeIndex;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('contestants', ContestantIndex::class)->name('contestants');
Route::get('judges', JudgeIndex::class)->name('judges');

require __DIR__ . '/auth.php';
