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
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {
  $http = new GuzzleHttp\Client;

  $response = $http->post('http://dev.lets-eat.co/oauth/token', [
      'form_params' => [
          'grant_type' => 'password',
          'client_id' => '2',
          'client_secret' => 'TJ00pCuMdCFg78sOvUGb0xwO69eDGoGG6QeXS164',
          'username' => '12022714817',
          'password' => 'W7WmBZoipjsDsmMPDLyf',
          'scope' => '',
      ],
  ]);

  return json_decode((string) $response->getBody(), true);
  });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/login2',function() {

  return view('test');
});

Route::get('/login-test',function() {



});

Route::get('/logout2', function() {
    Auth::logout();
});

Route::get('/test2/',function() {
  return ( Auth::user() );
});

Route::get('/test3/',function() {
  return ( Auth::check() ) ? "yep" : "nope";
});





