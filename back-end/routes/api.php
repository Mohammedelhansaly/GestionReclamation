<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReclamationController;
use App\Models\Client;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::group(['middleware' => 'api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});


Route::get('/listesDesReclamations', [ReclamationController::class, 'index']);
Route::post('/CreateDesReclamation', [ReclamationController::class, 'store']);
Route::get('/ModifierUneReclamation/{id}', [ReclamationController::class, 'edit']);
Route::post('/ModifierUneReclamation/update/{id}', [ReclamationController::class, 'update']);
Route::get('/afficherDetailReclamation/show/{id}', [ReclamationController::class, 'show']);
Route::get('/suprimmerUneReclamation/destroy/{id}', [ReclamationController::class, 'destroy']);