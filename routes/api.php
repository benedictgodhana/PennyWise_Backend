<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FinancialLiteracyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TraderController;

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
// routes/api.php

Route::post('/registerTrader', [TraderController::class, 'registerTrader']);

Route::get('/user', [UserController::class, 'show'])->middleware('auth:sanctum');
Route::get('/financial_literacy_resources', [FinancialLiteracyController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/userCount', [UserController::class, 'getUserCount']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
