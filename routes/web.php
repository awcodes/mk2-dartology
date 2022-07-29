<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('/flipout', 'flipout')->name('flipout');
Route::view('/checkouts', 'checkouts')->name('checkouts');
Route::view('/setups', 'setups')->name('setups');
Route::view('/analyzer', 'analyzer.instructions')->name('analyzer');
// Route::view('/analyzer/analyze', 'analyzer.analyze')->name('analyzer.analyze');

Route::get('/routines', [Controllers\RoutinesController::class, 'index'])->name('routines.index');
Route::get('/routines/random', [Controllers\RoutinesController::class, 'random'])->name('routines.random');
Route::get('/routines/{routine:slug}', [Controllers\RoutinesController::class, 'show'])->name('routines.show');

Route::get('/skills', [Controllers\SkillsController::class, 'index'])->name('skills.index');
Route::get('/skills/{skill:slug}', [Controllers\SkillsController::class, 'show'])->name('skills.show');

Route::post('/results/{routine}', [Controllers\ResultController::class, 'store'])->name('results.store');

Route::get('/profile/{user:username}', [Controllers\ProfileController::class, 'show'])->name('profile.show');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile/edit/{user:username}', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
// });

// require __DIR__ . '/auth.php';
