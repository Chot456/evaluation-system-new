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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//user
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'User\UserController@user')->name('showUsers');
Route::get('/showAddUser', 'User\UserController@addUser')->name('addUser');
Route::get('/users/{id}', 'User\UserController@show')->name('users');
Route::get('/users/{id}/edit', 'User\UserController@edit')->name('editUser');
Route::get('/showChangePassword', 'User\UserController@showChangePassword')->name('showChangePassword');
//change password

// REST user
Route::post('/createUser', 'User\UserController@store')->name('store');
Route::patch('/updateUser/{id}', 'User\UserController@update')->name('updateUser');
Route::delete('/deleteUser/{id}', 'User\UserController@destroy')->name('deleteUser');
Route::patch('/changePassword/{id}', 'User\UserController@changePassword')->name('changePassword');

//--------------------------------------------------------------------------------------------------//

//questionaire
Route::get('/questionaire', 'Questionaire\QuestionaireController@index')->name('showQuestionaire');
Route::get('/editQuestionaire/{id}', 'Questionaire\QuestionaireController@edit')->name('editQuestionaire');
//rest
Route::patch('/updateQuestion/{id}', 'Questionaire\QuestionaireController@update')->name('updateQuestion');

//--------------------------------------------------------------------------------------------------//

//evaluation
Route::get('/evaluation', 'Evaluation\EvaluationController@index')->name('showEvaluation');
Route::get('showEvaluationForm/{evaluator_id}/{employee_id}/{evaluate_id}', 'Evaluation\EvaluationController@showEvaluationForm')->name('showEvaluationForm');
//rest
Route::post('/addEmployeeToEvaluate', 'Evaluation\EvaluationController@store')->name('addEmployeeToEvaluate');
//-----------------------------------------------------------------------------------------------------//


//evaluation Summary
Route::get('/evaluationSummary', 'Evaluation\EvaluationSummaryController@index')->name('evaluationSummary');
Route::get('/showEvaluationRecord/{id}', 'Evaluation\EvaluationSummaryController@show')->name('showEvaluationRecord');
//rest 
Route::post('/createEvaluationSummary', 'Evaluation\EvaluationSummaryController@store')->name('createEvaluationSummary');
//-----------------------------------------------------------------------------------------------------//

//school year
Route::get('/schoolYear', 'SchoolYear\SchoolYearController@index')->name('schoolYear');

//-----------------------------------------------------------------------------------------------------//

//activity log
Route::get('/activityLogs', 'ActivityLog\ActivityLogController@index')->name('activityLogs');



