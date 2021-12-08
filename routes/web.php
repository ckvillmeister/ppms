<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ClassExpenditureController;
use App\Http\Controllers\ObjectExpenditureController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;

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

Route::get('myprocurement', [ProcurementController::class, 'index']);
Route::get('ppmp', [ProcurementController::class, 'index']);
Route::post('ppmp/itemlist', [ProcurementController::class, 'itemList']);
Route::post('ppmp/create', [ProcurementController::class, 'create']);
Route::post('ppmp/procurementlist', [ProcurementController::class, 'retrieveProcurementList']);
Route::post('procurement.toggleProcurementItem', [ProcurementController::class, 'toggleProcurementItem']);
Route::post('procurement.updateProcItems', [ProcurementController::class, 'updateProcItems']);
Route::post('procurement.proclist', [ProcurementController::class, 'retrieveProcurements']);
Route::post('procurement.removeItemFromProcList', [ProcurementController::class, 'removeItemFromProcList']);
Route::post('procurement.replicateprocurement', [ProcurementController::class, 'replicateProcurement']);
Route::post('procurement.approveprocurement', [ProcurementController::class, 'approveProcurement']);
Route::post('procurement.getprocurementinfo', [ProcurementController::class, 'getProcurementInfo']);

Route::get('reports', [ReportsController::class, 'index']);
Route::post('reports.getDeptPPMP', [ReportsController::class, 'retrieveDeptPPMP']);
Route::post('APPDILG', [ReportsController::class, 'retrieveAPP']);
Route::post('APPDBM', [ReportsController::class, 'retrieveAPP']);
Route::post('APPCSE', [ReportsController::class, 'retrieveAPP']);

Route::get('departments', [DepartmentsController::class, 'index']);
Route::post('departments.retrieveDepartments', [DepartmentsController::class, 'retrieveDepartments']);
Route::post('departments.getForm', [DepartmentsController::class, 'getForm']);
Route::post('departments.create', [DepartmentsController::class, 'create']);
Route::post('departments.toggleStatus', [DepartmentsController::class, 'toggleStatus']);

Route::get('items', [ItemsController::class, 'index']);
Route::post('{route}', [ItemsController::class, 'retrieveItems'])->where('route', '(myprocurementRetrieveItems|manageprocurementRetrieveItems|manageprocurementRetrieveItemsUpdate|itemsRetrieveItems)');
Route::post('items.getForm', [ItemsController::class, 'getForm']);
Route::post('items.create', [ItemsController::class, 'create']);
Route::post('items.toggleStatus', [ItemsController::class, 'toggleStatus']);
Route::post('items.getQueriedItems', [ItemsController::class, 'getQueriedItemName']);
Route::post('items.replicateitems', [ItemsController::class, 'replicateItems']);

Route::get('class', [ClassExpenditureController::class, 'index']);
Route::post('class_expenditures.retrieveClassExpenditures', [ClassExpenditureController::class, 'retrieveClassExpenditures']);
Route::post('class_expenditures.getForm', [ClassExpenditureController::class, 'getForm']);
Route::post('class_expenditures.create', [ClassExpenditureController::class, 'create']);
Route::post('class_expenditures.toggleStatus', [ClassExpenditureController::class, 'toggleStatus']);

Route::get('object', [ObjectExpenditureController::class, 'index']);
Route::post('object_expenditures.retrieveObjectExpenditures', [ObjectExpenditureController::class, 'retrieveObjectExpenditures']);
Route::post('object_expenditures.retrievobjectsbyclass', [ObjectExpenditureController::class, 'retrieveObjectExpendituresByClass']);
Route::post('object_expenditures.getForm', [ObjectExpenditureController::class, 'getForm']);
Route::post('object_expenditures.create', [ObjectExpenditureController::class, 'create']);
Route::post('object_expenditures.toggleStatus', [ObjectExpenditureController::class, 'toggleStatus']);

Route::get('categories', [CategoriesController::class, 'index']);
Route::post('categories.retrieveCategories', [CategoriesController::class, 'retrieveCategories']);
Route::post('categories.getForm', [CategoriesController::class, 'getForm']);
Route::post('categories.create', [CategoriesController::class, 'create']);
Route::post('categories.toggleStatus', [CategoriesController::class, 'toggleStatus']);

Route::get('units', [UnitsController::class, 'index']);
Route::post('units.retrieveUnits', [UnitsController::class, 'retrieveUnits']);
Route::post('units.getForm', [UnitsController::class, 'getForm']);
Route::post('units.create', [UnitsController::class, 'create']);
Route::post('units.toggleStatus', [UnitsController::class, 'toggleStatus']);

Route::get('roles', [RolesController::class, 'index']);
Route::get('roles/managepermissions', [RolesController::class, 'managePermissions']);
Route::post('roles.retrieveRoles', [RolesController::class, 'retrieveRoles']);
Route::post('roles.getForm', [RolesController::class, 'getForm']);
Route::post('roles.create', [RolesController::class, 'create']);
Route::post('roles.toggleStatus', [RolesController::class, 'toggleStatus']);
Route::post('roles.saveRolePermissions', [RolesController::class, 'saveRolePermissions']);

Route::get('accounts', [UserController::class, 'index']);
Route::post('accounts.retrieveAccounts', [UserController::class, 'retrieveAccounts']);
Route::post('accounts.getForm', [UserController::class, 'getForm']);
Route::post('accounts.create', [UserController::class, 'create']);
Route::post('accounts.toggleStatus', [UserController::class, 'toggleStatus']);
Route::post('accounts.resetpass', [UserController::class, 'resetPassword']);

Route::get('settings', [SettingsController::class, 'index']);
Route::post('settings.save', [SettingsController::class, 'saveSettings']);
Route::get('settings.backupDatabase', [SettingsController::class, 'backupDatabase']);
Route::post('settings.toggleStatus', [SettingsController::class, 'toggleProcurementStatus']);

