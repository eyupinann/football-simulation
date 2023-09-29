<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Group\GroupController;
use App\Http\Controllers\API\Match\MatchController;
use App\Http\Controllers\API\Simulation\SimulationController;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/groups', [GroupController::class, 'index']);

Route::get('/matches', [MatchController::class, 'index']);
Route::get('/match-reset', [MatchController::class, 'reset']);

Route::get('/simulation', [SimulationController::class, 'index']);
