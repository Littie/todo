<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('admin', ['uses' => 'AdminController@index', 'as' => 'adminIndex']);

Route::post('register', ['uses' => 'RegistrationController@store', 'as' => 'userRegister']);
Route::get('register/verify/{confirmationCode}', ['uses' => 'RegistrationController@confirm', 'as' => 'confirmationUser']);

/*
 * Tasks Routes
 */

Route::match(['get', 'post'], '/', ['middleware' => 'auth', 'uses' => 'TaskController@index', 'as' => 'indexGetTask']);
Route::get('delete/{id}', ['uses' => 'TaskController@delete', 'as' => 'deleteTask']);
Route::get('edit/{id}', ['uses' => 'TaskController@edit', 'as' => 'editTask']);
Route::post('store', ['uses' => 'TaskController@store', 'as' => 'storeEditedTask']);
Route::patch('store/{id}', ['uses' => 'TaskController@update', 'as' => 'storeEditedTask']);
Route::get('show/{id}', ['uses' => 'TaskController@show', 'as' => 'showTask']);
Route::get('create', ['uses' => 'TaskController@create', 'as' => 'createTask']);
Route::get('check/{id}', ['uses' => 'TaskController@check', 'as' => 'checkTask']);
Route::get('completed', ['uses' => 'TaskController@showCompleted', 'as' => 'showCompletedGetTask']);
Route::post('completed', ['uses' => 'TaskController@showCompleted', 'as' => 'showCompletedPostTask']);
Route::get('restore/{id}', ['uses' => 'TaskController@restore', 'as' => 'restoreTask']);
Route::get('back', ['uses' => 'TaskController@back', 'as' => 'back']);

/*
 * Statistics route
 */

Route::match(['get', 'post'], 'statistic/{period}', ['uses' => 'TaskController@statistic', 'as' => 'statisticsPeriodTask']);
Route::post('statistics/day', ['uses' => 'StatisticController@day', 'as' => 'userDayStatistic']);
Route::post('statistics/week', ['uses' => 'StatisticController@week', 'as' => 'userWeekStatistic']);
Route::post('statistics/month', ['uses' => 'StatisticController@month', 'as' => 'userMonthStatistic']);
Route::match(['get', 'post'], 'statistics/custom', ['uses' => 'StatisticController@custom', 'as' => 'userCustomStatistic']);

/*
 * Categories route
 */

Route::get('categories/{category}', ['uses' => 'TaskController@showGroup', 'as', 'showCategoryOfTask']);
Route::get('category/create', ['uses' => 'AdminController@createCategory', 'as' => 'adminCreateCategory']);
Route::post('category/store', ['uses' => 'AdminController@storeCategory', 'as' => 'adminStoreCategory']);


/*
 * Admin route
 */

Route::match(['get', 'post'], 'users/all', ['uses' => 'AdminController@showUsers', 'as' => 'adminShowUsers']);
Route::get('users/create', ['uses' => 'AdminController@createUser', 'as' => 'adminCreateUsers']);
Route::post('users/store', ['uses' => 'AdminController@storeUser', 'as' => 'adminStoreUsers']);
Route::match(['get', 'post'], 'users/disabled', ['uses' => 'AdminController@showDisabledUsers', 'as' => 'adminDisabledUsers']);
Route::get('users/enable/{id}', ['uses' => 'AdminController@enableUser', 'as' => 'adminEnableUsers']);
Route::get('users/show/{id}', ['uses' => 'AdminController@showUser', 'as' => 'adminShowUser']);
Route::get('users/edit/{id}', ['uses' => 'AdminController@editUser', 'as' => 'adminEditUser']);
Route::post('users/update/{id}', ['uses' => 'AdminController@updateUser', 'as' => 'adminUpdateUser']);
Route::get('users/disable/{id}', ['uses' => 'AdminController@disableUser', 'as' => 'adminDisableUser']);














