<?php

use Illuminate\Http\Request;
use App\Http\Controllers\SMSAuthController;
use App\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {

    $user = $request->user();
    return $user->groups()->with('lists')->get();

});

Route::resource('groups','UserGroupController');
Route::resource('groups.lists','GroupListController');

Route::post('auth/sms', 'SMSAuthController@getToken');
Route::post('auth/sms/authorize', 'SMSAuthController@validateToken');

