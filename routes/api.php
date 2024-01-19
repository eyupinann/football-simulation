<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Group\GroupController;
use App\Http\Controllers\API\Match\MatchController;
use App\Http\Controllers\API\Simulation\SimulationController;
use App\Http\Controllers\API\Team\TeamController;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('/matches', [MatchController::class, 'index']);

Route::get('/result', [MatchController::class, 'result']);

Route::get('/reset-data', [MatchController::class, 'reset']);

Route::get('/simulation-all-weeks', [SimulationController::class, 'index']);

Route::get('/simulation-next-weeks', [SimulationController::class, 'next']);

Route::get('/teams', [TeamController::class, 'index']);
