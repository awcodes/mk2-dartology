<?php

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

Route::get('/routines', [Api\RoutineController::class, 'index']);
Route::get('/routines/random', [Api\RoutineController::class, 'random']);
Route::get('/routines/{routine:slug}', [Api\RoutineController::class, 'show']);

Route::get('/skills', [Api\SkillController::class, 'index']);
Route::get('/skills/{skill}', [Api\SkillsController::class, 'show']);

Route::get('/checkouts', [Api\CheckoutController::class, 'index']);
Route::get('/checkouts/{checkout}', [Api\CheckoutController::class, 'show']);

Route::get('/setups', [Api\SetupController::class, 'index']);
Route::get('/setups/{setup}', [Api\SetupController::class, 'show']);
