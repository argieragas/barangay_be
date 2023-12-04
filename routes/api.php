<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CaseController;

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

Route::get('getUser', [Controller::class, 'getUser']);
Route::get('userData/{id}', [Controller::class, 'userData']);
Route::get('getReport', [Controller::class, 'getReport']);
Route::get('getCase', [CaseController::class, 'getCase']);
Route::get('getAllLocation', [Controller::class, 'getLocation']);
Route::post('login', [Controller::class, 'login']);
Route::post('register', [MainController::class, 'register']);
Route::post('newCase', [CaseController::class, 'newCase']);
Route::post('updateCase', [CaseController::class, 'updateCase']);
Route::post('newReport', [ReportController::class, 'newReport']);
Route::delete('deleteReport/{id}', [ReportController::class, 'deleteReport']);
Route::delete('deleteCase/{id}', [CaseController::class, 'deleteCase']);
Route::post('updateReport', [ReportController::class, 'updateReport']);
Route::get('getLocationReport', [ReportController::class, 'getLocationReport']);
Route::get('getLocationCase', [CaseController::class, 'getLocationCase']);
Route::get('getCount', [MainController::class, 'getCount']);
Route::get('getDashboard', [MainController::class, 'getDashboard']);
Route::get('getUser', [Controller::class, 'getUser']);