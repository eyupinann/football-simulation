<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Simulation\MatchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teams', [MatchController::class, 'index'])->name('teams.index');
Route::get('/matches', [MatchController::class, 'simulate'])->name('matches.index');
