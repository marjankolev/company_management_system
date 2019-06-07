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

Route::get('/', function(){
	return view('index');
});

Route::get('/projects', 'projectsController@index');
Route::get('/projects/create', 'projectsController@create');
Route::post('/projects', 'projectsController@store');
Route::get('/projects/{project}/addtask', 'projectsController@addtask');
Route::post('/projects/{project}/addtask', 'projectsController@storetask');
Route::get('/projects/{project}', 'projectsController@showproject');
Route::get('/projects/{project}/edit', 'projectsController@edit');
Route::patch('/projects/{project}/update', 'projectsController@update');
Route::get('/projects/{project}/delete', 'projectsController@destroy');

Route::get('/employeess', 'employeesController@index');
Route::get('/employees/create', 'employeesController@create');
Route::post('/employees', 'employeesController@store');
Route::get('/employees/{employee}', 'employeesController@showemployee');
Route::post('/employees/{employee}', 'employeesController@assigntask');
Route::get('/employees/{employee}/edit', 'employeesController@edit');
Route::patch('/employees/{employee}/update', 'employeesController@update');
Route::get('/employees/{employee}/delete', 'employeesController@destroy');

Route::get('/tasks', 'tasksController@index');
Route::get('/tasks/create', 'tasksController@create');
Route::post('/tasks/create', 'tasksController@createtask');
Route::get('/tasks/{task}', 'tasksController@showtask');
Route::get('/tasks/{task}/edit', 'tasksController@edit');
Route::patch('/tasks/{task}/update', 'tasksController@update');
Route::get('/tasks/{task}/delete', 'tasksController@destroy');

Route::post('/tasks/{task}', 'timesheetsController@addtimesheet');
Route::get('/tasks/timesheet/{timesheet}/delete', 'timesheetsController@destroy');
Route::get('/tasks/timesheet/{timesheet}/edit', 'timesheetsController@edit');
Route::patch('/tasks/timesheet/{timesheet}/update', 'timesheetsController@update');

Route::get('/leaves', 'leavesController@index');
Route::get('/leaves/create', 'leavesController@create');
Route::post('/leaves/create', 'leavesController@store');
Route::get('/leaves/{leave}/edit', 'leavesController@edit');
Route::patch('/leaves/{leave}/update', 'leavesController@update');
Route::get('/leaves/{leave}/delete', 'leavesController@destroy');






