<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('pages.home');
});

/* Registration */
Route::get('register', ['as' => 'register','uses' => 'UsersController@create']);
Route::post('register', ['as' => 'register','uses' => 'UsersController@store']);

/* Authentication */
Route::get('login', ['as' => 'login','uses' => 'SessionController@create']);
Route::post('login', ['as' => 'login','uses' => 'SessionController@store']);
Route::get('logout', ['as' => 'logout','uses' => 'SessionController@destroy']);

/* Dashboard */
Route::get('dashboard', ['before' => 'auth',
	'as' => 'dashboard',
	'uses' => 'DashboardController@index'
]);

Route::resource('courses', 'CoursesController');
Route::resource('exams', 'ExamsController');
//Route::get('exams/{id}/update', 'ExamsController@update');

/* Course Management */
Route::group(array('prefix' => 'courses'), function() {
    Route::get('{id}/study','StudyController@index');
    Route::get('{id}/learn', 'LearnController@index');
});

/* API */
Route::group(array('namespace' => 'ApiV1'), function() {
    Route::group(array('prefix' => 'api/v1'), function() {
        Route::resource('categories', 'CategoriesController'); 
        Route::resource('exams', 'ExamsController'); 
        Route::resource('exams.topics', 'TopicsController');
        Route::resource('exams.cards', 'ExamCardController');
        Route::resource('courses.cards', 'CourseCardController');
    });
});

/* Admin */
/*Route::get('admin', function() {
    return View::make('admin');
});*/