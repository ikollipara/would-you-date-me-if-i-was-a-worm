<?php

use App\Http\Controllers\WormMatchesController;
use App\Http\Controllers\WormsController;
use App\Models\Worm;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn() => Inertia::render('Home'))->name('home');
Route::resource('worms', WormsController::class)->except(['index', 'destroy', 'edit', 'update']);
Route::resource('worms.matches', WormMatchesController::class)->only(['index', 'store']);

Route::post('/worms/find-by-email', function() {
    $worm = Worm::where('email', request('email'))->first();
    if($worm) {
        return redirect(status: 303)->route('worms.show', $worm);
    } else {
        return redirect(status: 303)->route('worms.create');
    }
});
