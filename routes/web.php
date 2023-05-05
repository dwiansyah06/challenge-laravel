<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GlobalController::class, 'dashboard'])->name('dashboard');

Route::resource('/nasabah', \App\Http\Controllers\NasabahController::class);
Route::resource('/transaction', \App\Http\Controllers\TransactionController::class);
Route::resource('/points', \App\Http\Controllers\PointsController::class);
Route::resource('/report', \App\Http\Controllers\ReportController::class);

Route::get('/generate-report', [ReportController::class, 'generateReport']);