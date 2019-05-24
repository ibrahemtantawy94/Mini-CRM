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
Auth::routes();

Route::get('/', 'HomeController@index');
/**
 * Companies Routes
 */
Route::group(array('prefix' => 'companies'), function() {

    Route::get('/', 'CompaniesController@index')->name('companies.list');
    Route::get('/add', 'CompaniesController@create')->name('companies.create');
    Route::get('/{id}', 'CompaniesController@show')->name('companies.show');
    Route::post('/add', 'CompaniesController@store')->name('companies.store');
    Route::get('/{id}/edit', 'CompaniesController@edit')->name('companies.edit');
    Route::patch('/{id}', 'CompaniesController@update')->name('companies.update');
    Route::delete('/{id}', 'CompaniesController@destroy')->name('companies.delete');

});

/**
 * Employees Routes
 */
Route::group(array('prefix' => 'employees'), function() {

    Route::get('/', 'EmployeesController@index')->name('employees.list');
    Route::get('/add/{company_id?}', 'EmployeesController@create')->name('employees.create');
    Route::get('/{id}', 'EmployeesController@show')->name('employees.show');
    Route::post('/add', 'EmployeesController@store')->name('employees.store');
    Route::get('/{id}/edit', 'EmployeesController@edit')->name('employees.edit');
    Route::patch('/{id}', 'EmployeesController@update')->name('employees.update');
    Route::delete('/{id}', 'EmployeesController@destroy')->name('employees.delete');

});