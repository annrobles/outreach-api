<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

 });

Route::post('/signup', ['as' => '', 'uses' => 'Api\AuthController@createUser']);
Route::post('/signin', ['as' => '', 'uses' => 'Api\AuthController@loginUser']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('company', 'CompanyController');
    Route::apiResource('student', 'StudentController');
    Route::apiResource('skillset', 'SkillsetController');
    Route::apiResource('userLocation', 'UserLocationController');
    Route::apiResource('studentSkillset', 'StudentSkillsetController');
    Route::apiResource('studentRank', 'StudentRankController');
    Route::apiResource('companySkillset', 'CompanySkillsetController');
    Route::apiResource('user', 'UserController');
    Route::apiResource('college', 'CollegeController');

    Route::post('jobs', 'JobsController@store');
    Route::put('jobs/{jobs}', 'JobsController@update');
    Route::delete('jobs/{jobs}', 'JobsController@destroy');
});

Route::get('jobs', 'JobsController@index');
Route::get('jobs/{jobs}', 'JobsController@show');
Route::get('jobs/user/{user}', 'JobsController@showByUser');
