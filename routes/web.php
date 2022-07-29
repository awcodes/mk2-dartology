<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['splade'])->group(function () {
    Route::get('/', fn () => view('home'))->name('welcome');
    Route::get('/docs', fn () => view('docs'))->name('docs');
    Route::get('/flipout', fn () => view('flipout'))->name('flipout');
    Route::get('/setups', fn () => view('setups'))->name('setups');
    Route::get('/checkouts', fn () => view('checkouts'))->name('checkouts');
    Route::get('/analyzer', fn () => view('analyzer'))->name('analyzer');

    Route::get('/routines', fn () => view('routines.index'))->name('routines.index');
    Route::get('/routines/random', fn () => view('routines.random'))->name('routines.random');
    Route::get('/routines/{routine:slug}', fn () => view('routines.show'))->name('routines.show');

    Route::get('/skills', fn () => view('skills'))->name('skills.index');
    Route::get('/skills/{skill:slug}', fn () => view('skills.show'))->name('skills.show');

    Route::post('/results/{routine}', fn () => view('results.store'))->name('results.store');

    Route::get('/profile/{user:username}', fn () => view('profile.show'))->name('profile.show');
});
