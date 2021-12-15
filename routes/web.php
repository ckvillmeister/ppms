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

Route::get('ppmp', [ProcurementController::class, 'index']);
Route::post('ppmp/itemlist', [ProcurementController::class, 'itemList']);
Route::post('ppmp/itemlistforupdate', [ProcurementController::class, 'itemListForUpdate']);
Route::post('ppmp/create', [ProcurementController::class, 'create']);
Route::post('ppmp/replaceitem', [ProcurementController::class, 'replaceItem']);
Route::post('ppmp/procurementlist', [ProcurementController::class, 'retrieveProcurementList']);
Route::post('ppmp/update/{attribute}', [ProcurementController::class, 'update']);
Route::post('ppmp/toggleprocurementitemstatus', [ProcurementController::class, 'toggleProcurementItemStatus']);
Route::post('ppmp/toggleprocurementitemmonth', [ProcurementController::class, 'toggleProcurementItemMonth']);
Route::post('ppmp/getprocurementinfo', [ProcurementController::class, 'getProcurementInfo']);
Route::post('ppmp/replicateprocurement', [ProcurementController::class, 'replicateProcurement']);
Route::post('ppmp/approveprocurement', [ProcurementController::class, 'approveProcurement']);
Route::post('ppmp/retrievebudgetedobjs', [ProcurementController::class, 'retrieveBudgetedObjects']);
Route::post('ppmp/getnewprocurementform', [ProcurementController::class, 'getNewProcurementForm']);
Route::post('ppmp/getitems', [ProcurementController::class, 'getItems']);
Route::post('ppmp/getunits', [ProcurementController::class, 'getUnits']);

//Route::get('reports', [ReportsController::class, 'index']);
Route::get('reports/app', [ReportsController::class, 'index']);
Route::post('reports/getppmp', [ReportsController::class, 'retrieveDeptPPMP']);
Route::post('APPDILG', [ReportsController::class, 'retrieveAPP']);
Route::post('APPDBM', [ReportsController::class, 'retrieveAPP']);
Route::post('APPCSE', [ReportsController::class, 'retrieveAPP']);

Route::get('departments', [DepartmentsController::class, 'index']);
Route::get('departments/set', [DepartmentsController::class, 'index']);
Route::post('departments/retrievedepartments', [DepartmentsController::class, 'retrieveDepartments']);
Route::post('departments/getform', [DepartmentsController::class, 'getForm']);
Route::post('departments/create', [DepartmentsController::class, 'create']);
Route::post('departments/togglestatus', [DepartmentsController::class, 'toggleStatus']);

Route::get('items', [ItemsController::class, 'index']);
Route::get('items/retrieveitems', [ItemsController::class, 'retrieveItems']);
Route::post('{route}', [ItemsController::class, 'retrieveItems'])->where('route', '(myprocurementRetrieveItems|manageprocurementRetrieveItems|manageprocurementRetrieveItemsUpdate|itemsRetrieveItems)');
Route::post('items/getform', [ItemsController::class, 'getForm']);
Route::post('items/create', [ItemsController::class, 'create']);
Route::post('items/togglestatus', [ItemsController::class, 'toggleStatus']);

Route::get('class', [ClassExpenditureController::class, 'index']);
Route::post('class/retrieveclassexpenditures', [ClassExpenditureController::class, 'retrieveClassExpenditures']);
Route::post('class/getform', [ClassExpenditureController::class, 'getForm']);
Route::post('class/create', [ClassExpenditureController::class, 'create']);
Route::post('class/togglestatus', [ClassExpenditureController::class, 'toggleStatus']);

Route::get('object', [ObjectExpenditureController::class, 'index']);
Route::get('object/setbudget', [ObjectExpenditureController::class, 'setDepartmentBudget']);
Route::post('object/retrieveobjectexpenditures', [ObjectExpenditureController::class, 'retrieveObjectExpenditures']);
Route::post('object/retrieveobjectsforbudget', [ObjectExpenditureController::class, 'retrieveOBjectListforBudgeting']);
Route::post('object/retrievobjectsbyclass', [ObjectExpenditureController::class, 'retrieveObjectExpendituresByClass']);
Route::post('object/getform', [ObjectExpenditureController::class, 'getForm']);
Route::post('object/create', [ObjectExpenditureController::class, 'create']);
Route::post('object/togglestatus', [ObjectExpenditureController::class, 'toggleStatus']);
Route::post('object/setbudget', [ObjectExpenditureController::class, 'setBudget']);
Route::post('object/setaipcode', [ObjectExpenditureController::class, 'setAIPCode']);

Route::get('categories', [CategoriesController::class, 'index']);
Route::post('categories/retrievecategories', [CategoriesController::class, 'retrieveCategories']);
Route::post('categories/getform', [CategoriesController::class, 'getForm']);
Route::post('categories/create', [CategoriesController::class, 'create']);
Route::post('categories/togglestatus', [CategoriesController::class, 'toggleStatus']);

Route::get('units', [UnitsController::class, 'index']);
Route::post('units/retrieveunits', [UnitsController::class, 'retrieveUnits']);
Route::post('units/getform', [UnitsController::class, 'getForm']);
Route::post('units/create', [UnitsController::class, 'create']);
Route::post('units/togglestatus', [UnitsController::class, 'toggleStatus']);

Route::get('roles', [RolesController::class, 'index']);
Route::get('roles/managepermissions', [RolesController::class, 'managePermissions']);
Route::post('roles/retrieveroles', [RolesController::class, 'retrieveRoles']);
Route::post('roles/getform', [RolesController::class, 'getForm']);
Route::post('roles/create', [RolesController::class, 'create']);
Route::post('roles/togglestatus', [RolesController::class, 'toggleStatus']);
Route::post('roles/saverolepermissions', [RolesController::class, 'saveRolePermissions']);

Route::get('accounts', [UserController::class, 'index']);
Route::post('accounts/retrieveaccounts', [UserController::class, 'retrieveAccounts']);
Route::post('accounts/getform', [UserController::class, 'getForm']);
Route::post('accounts/create', [UserController::class, 'create']);
Route::post('accounts/togglestatus', [UserController::class, 'toggleStatus']);
Route::post('accounts/resetpass', [UserController::class, 'resetPassword']);

Route::get('settings', [SettingsController::class, 'index']);
Route::post('settings.save', [SettingsController::class, 'saveSettings']);
Route::get('settings.backupDatabase', [SettingsController::class, 'backupDatabase']);
Route::post('settings.toggleStatus', [SettingsController::class, 'toggleProcurementStatus']);

