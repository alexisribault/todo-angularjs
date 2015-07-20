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

Route::get('/', function () {
    return view('welcome');
});

// Provide controller methods with object instead of ID
Route::model('task', 'Task');
Route::model('project', 'Project');

Route::resource('project', 'ProjectController');
Route::resource('project.task', 'TaskController');

Route::bind('task', function($value, $route) {
    return App\Task::whereSlug($value)->first();
});
Route::bind('project', function($value, $route) {
    return App\Project::whereSlug($value)->first();
});

Route::resource('api/todos','TodoController');

Route::get('todoapp','TodoAppController@index');

Route::resource('api/books','BooksController');
