<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ItemsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthenticationController::class, 'index']);
Route::post('authenticate', [AuthenticationController::class, 'authenticate']);

Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('procurement', [ProcurementController::class, 'index']);
Route::get('reports', [ReportsController::class, 'index']);
Route::get('items', [ItemsController::class, 'displayItemListProcurement']);
