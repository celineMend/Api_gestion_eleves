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
Route::post('evaluations', [EvaluationController::class, 'store']);
Route::put('evaluations/{id}', [EvaluationController::class, 'update']);
Route::get('evaluations', [EvaluationController::class, 'index']);
Route::get('evaluations/{id}', [EvaluationController::class, 'show']);
Route::delete('evaluations/{id}', [EvaluationController::class, 'destroy']);
Route::post('evaluations/{id}/restore', [EvaluationController::class, 'restore']);
Route::delete('evaluations/{id}/force-delete', [EvaluationController::class, 'forceDelete']);
Route::get('evaluations/trashed', [EvaluationController::class, 'trashed']);