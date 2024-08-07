<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);

 // Eleve Routes
Route::get('eleves', [EleveController::class, 'index']);
Route::post('add/eleve', [EleveController::class, 'store']);
Route::get('detail/eleve/{eleve}', [EleveController::class, 'show']);
Route::put('update/eleve/{eleve}', [EleveController::class, 'update']);
Route::delete('delete/eleve/{eleve}', [EleveController::class, 'destroy']);
Route::post('eleves/restore/{id}', [EleveController::class, 'restore']);
Route::delete('eleves/force-delete/{id}', [EleveController::class, 'forceDelete']);
Route::get('eleves/trashed', [EleveController::class, 'trashed']);

// Evaluation Routes
Route::get('evaluations', [EvaluationController::class, 'index']);
Route::post('add/evaluation/{etudiantId}', [EvaluationController::class, 'store']);
Route::get('detail/evaluation/{evaluation}', [EvaluationController::class, 'show']);
Route::put('update/evaluation/{id}', [EvaluationController::class, 'update']);
Route::delete('delete/evaluation/{evaluation}', [EvaluationController::class, 'destroy']);

