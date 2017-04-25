<?php

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

Route::get('/test', 'TestController@test');
Route::get('/', 'HomeController@index');

Route::get("/logout", "Auth\LoginController@logout");
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::post('files/upload', 'FilesController@upload');
    Route::post('files/remove', 'FilesController@remove');
});

//  web API
Route::group(['prefix' => 'json/master-files', 'namespace' => 'Modules\MasterFiles', 'middleware' => ['auth']], function () {
    Route::get('companies', 'CompaniesController@jsonList');
    Route::get('location', 'LocationsController@jsonList');
});

Route::group(['prefix' => 'master-files', 'namespace' => 'Modules\MasterFiles', 'middleware' => ['auth']], function () {
    Route::get('number-series/datatable', 'NumberSeriesController@datatable');
    Route::resource('number-series', 'NumberSeriesController');

    Route::get('locations/datatable', 'LocationsController@datatable');
    Route::resource('locations', 'LocationsController');

    Route::get('companies/datatable', 'CompaniesController@datatable');
    Route::resource('companies', 'CompaniesController');

    Route::get('tax-categories/datatable', 'Payroll\TaxCategoriesController@datatable');
    Route::get('tax-categories', 'Payroll\TaxCategoriesController@index');

    Route::get('computation-tables/{tableType}/datatable', 'Payroll\ComputationTablesController@datatable');
    Route::get('computation-tables/{tableType}', 'Payroll\ComputationTablesController@index');
});

Route::group(['prefix' => 'security', 'namespace' => 'Modules\Security', 'middleware' => ['auth']], function () {
    Route::get('roles/datatable', 'RolesController@datatable');
    Route::resource('roles', 'RolesController');

    Route::get('acl/datatable', 'ACLController@datatable');
    Route::resource('acl', 'ACLController');
});

//Employee Self Service
Route::group(['prefix' => 'HRIS', 'namespace' => 'Modules\HRIS\ESS', 'middleware' => ['auth']], function () {
    Route::get('work-schedule/setup', 'WorkScheduleController@setup');
    Route::post('work-schedule/setup/{employeeCode}', 'WorkScheduleController@update');
});

//  HRIS
Route::group(['prefix' => 'HRIS', 'namespace' => 'Modules\HRIS', 'middleware' => ['auth']], function () {
    Route::get('employees/paginated-json', 'EmployeesController@getPaginatedJSON');
    Route::get('employees/datatable', 'EmployeesController@datatable');
    Route::delete('employees/{employeeCode}/effective-date/{effectiveDate}', 'EmployeesController@destroyWorkSchedule');
    Route::resource('employees', 'EmployeesController');

    Route::get('policies/datatable', 'PoliciesController@datatable');
    Route::resource('policies', 'PoliciesController');
});

//  Timekeeping
Route::group(['prefix' => 'timekeeping', 'namespace' => 'Modules\Timekeeping', 'middleware' => ['auth']], function () {
    Route::get('employee-time-entries/json', 'EmployeeTimeEntriesController@getJSON');
    Route::post('employee-time-entries/import-excel', 'EmployeeTimeEntriesController@importFromExcel');
    Route::resource('employee-time-entries', 'EmployeeTimeEntriesController');
    Route::resource('employee-time-entry-corrections', 'EmployeeTimeEntryCorrectionController');
});

Route::group(['prefix' => 'payroll', 'namespace' => 'Modules\Payroll', 'middleware' => ['auth']], function () {

    Route::get('payroll-items/json', 'PayrollItemsController@getSelectableJSON');
    Route::get('payroll-items/{policyCode}/requires-employee-amount', 'PayrollItemsController@getRequiresEmployeeAmountJSON');
});

Route::group(['prefix' => 'reports', 'namespace' => 'Modules\Reports', 'middleware' => ['auth']], function () {
    Route::get('payslip', 'PayslipController@index');
    Route::get('bank-remittance', 'BankRemittanceController@index');
    Route::get('cash-payables', 'CashPayablesController@index');
    Route::get('philhealth-payables', 'PhilhealthPayablesController@index');
    Route::get('sss-payables', 'SSSPayablesController@index');
    Route::get('tax-payables', 'TaxWithheldPayablesController@index');
});

Route::group(['prefix' => 'production', 'namespace' => 'Modules\Production', 'middleware' => ['auth']], function () {
    Route::get('bom/datatable', 'BillOfMaterialsController@datatable');
    Route::resource('bom', 'BillOfMaterialsController');

    Route::get('production-orders/production-details', 'ProductionOrdersController@productionCostDetails');
    Route::get('production-orders/datatable', 'ProductionOrdersController@datatable');
    Route::resource('production-orders', 'ProductionOrdersController');
});
