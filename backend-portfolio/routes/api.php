<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EducationController;
use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\api\SkillController;
use App\Http\Controllers\api\WorkController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('/educations', EducationController::class)->except(['index']);
    Route::resource('/projects', ProjectController::class)->except(['index']);
    Route::resource('/skills', SkillController::class)->except(['index']);
    Route::resource('/works', WorkController::class)->except(['index']);
    Route::post('/addUser', [AuthController::class, 'addUser']);
    Route::post('/deleteUser/{user}', [AuthController::class, 'destroy']);
});

Route::get('/educations', [EducationController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/skills', [SkillController::class, 'index']);
Route::get('/works', [WorkController::class, 'index']);
