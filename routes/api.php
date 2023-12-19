<?php

use App\Http\Controllers\MonthlyIncomeController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\RecordOfSavingController;
use App\Http\Controllers\LiabilityController;
use App\Http\Controllers\BillController;
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

Route::patch('/bills/{bill}', [BillController::class, 'update']);
Route::patch('/liabilities/{liability}', [LiabilityController::class, 'update']);
Route::patch('/savingpay', [RecordOfSavingController::class, 'pay']);
Route::patch('/savingupdate', [RecordOfSavingController::class, 'update']);
Route::get('/savings/second', [RecordOfSavingController::class, 'second']);
Route::post('/saving', [RecordOfSavingController::class, 'store']);
Route::post('/income', [MonthlyIncomeController::class, 'store']);
Route::post('/expenditures', [ExpenditureController::class, 'store']);
Route::get('/expenditures', [ExpenditureController::class, 'index']);
Route::post('/bills', [BillController::class, 'store']);
Route::get('/bills', [BillController::class, 'index']);
Route::post('/liabilities', [LiabilityController::class, 'store']);
Route::get('/liabilities', [LiabilityController::class, 'index']);
Route::get('/savings', [RecordOfSavingController::class, 'index']);
Route::get('/savingshistory', [RecordOfSavingController::class, 'view']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
