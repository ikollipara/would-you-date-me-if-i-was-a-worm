<?php

use App\Http\Controllers\WormMatchesController;
use App\Http\Controllers\WormsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn() => Inertia::render('Home'))->name('home');
Route::resource('worms', WormsController::class)->except(['index', 'destroy']);
Route::resource('worms.matches', WormMatchesController::class)->only(['index', 'store']);
