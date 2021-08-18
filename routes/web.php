<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;

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
Route::get('authenticate/logout', [AuthenticationController::class, 'logout']);

Route::get('dashboard', [DashboardController::class, 'index']);

Route::get('procurement', [ProcurementController::class, 'index']);
Route::post('procurement.create', [ProcurementController::class, 'create']);
Route::post('procurement.retrieveProcurementList', [ProcurementController::class, 'retrieveProcurementList']);
Route::post('procurement.toggleProcurementItem', [ProcurementController::class, 'toggleProcurementItem']);
Route::get('manageproc', [ProcurementController::class, 'manageprocurement']);
Route::post('procurement.updateProcItems', [ProcurementController::class, 'updateProcItems']);
Route::post('procurement.proclist', [ProcurementController::class, 'retrieveProcurements']);
Route::post('procurement.removeItemFromProcList', [ProcurementController::class, 'removeItemFromProcList']);

Route::get('reports', [ReportsController::class, 'index']);
Route::post('reports.getDeptPPMP', [ReportsController::class, 'retrieveDeptPPMP']); 
Route::post('reports.retrieveAPP', [ReportsController::class, 'retrieveAPP']); 

Route::get('departments', [DepartmentsController::class, 'index']);
Route::post('departments.retrieveDepartments', [DepartmentsController::class, 'retrieveDepartments']);
Route::post('departments.getForm', [DepartmentsController::class, 'getForm']);

Route::get('items', [ItemsController::class, 'index']);
Route::post('items.retrieveItems', [ItemsController::class, 'retrieveItems']);
Route::post('items.getForm', [ItemsController::class, 'getForm']);
Route::post('items.create', [ItemsController::class, 'create']);
Route::get('items.displayItemListProcurement', [ItemsController::class, 'displayItemListProcurement']);
Route::post('items.getQueriedItems', [ItemsController::class, 'getQueriedItemName']);

Route::get('roles', [RolesController::class, 'index']);
Route::post('roles.retrieveRoles', [RolesController::class, 'retrieveRoles']);
Route::post('roles.getForm', [RolesController::class, 'getForm']);

Route::get('accounts', [UserController::class, 'index']);
Route::post('accounts.retrieveAccounts', [UserController::class, 'retrieveAccounts']);
Route::post('accounts.getForm', [UserController::class, 'getForm']);
