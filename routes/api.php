<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIControllers\JobController;
use App\Http\Controllers\APIControllers\AuthController;
use App\Http\Controllers\APIControllers\LeadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

// Leads Api 
Route::get('/leads', [LeadController::class, 'index'])->middleware('auth:sanctum');
Route::post('/leads', [LeadController::class, 'store'])->middleware('auth:sanctum');


// Get all jobs api/controller with middleware
Route::get('/jobs', [JobController::class, 'index'])->middleware('auth:sanctum');
Route::get('/jobs/{id}', [JobController::class, 'show'])->middleware('auth:sanctum');
// Store job api/controller
Route::post('/store-job', [JobController::class, 'store'])->name('store');
Route::put('/take-job/{id}', [JobController::class, 'takeJob'])->middleware('auth:sanctum');
Route::post('/store-proposal', [JobController::class, 'storeProposal'])->middleware('auth:sanctum');