<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});
Route::match(['get', 'post'], '/login', function (Request $request) {
    $mail = $request->cookie('mail');
    return view('login', ['mail' => $mail]);
})->name('login');

Route::get('/register', function () {
    return view('register');
});
Route::match(['get', 'post'], '/home', ['as' => 'info', 'uses' => 'AuthController@login']);

Route::get('/logout', 'AuthController@logout');

// Route::match(['get', 'post'], '/adduser', ['as' => 'adduser', 'uses' => 'AuthController@register']);
Route::post('/ajaxtest', ['as' => 'ajaxtest', 'uses' => 'AuthController@register']);
Route::get('/add', 'AuthController@addUser');
Route::post('/addPrj', ['as' => 'addPrj', 'uses' => 'AuthController@addPrj']);

Route::get('/project', 'AuthController@showPrj');

Route::get('/chat', function () {
    return view('chat');
});

Route::post('/sendMess', 'RedisController@sendMess');

Route::post('/addCard', 'AuthController@addCard');
Route::post('/addList', 'AuthController@addList');
Route::post('/showModal', 'AuthController@showModal');

Route::post('/uploadFile', 'AuthController@uploadFile');
Route::post('/description', 'AuthController@description');
Route::post('/checkList', 'AuthController@checklist');
Route::post('/searchUser', 'AuthController@searchUser');
Route::post('/showMess', 'AuthController@showMess');
Route::post('/saveMess', 'AuthController@saveMess');
Route::post('/moveCard', 'AuthController@moveCard');
