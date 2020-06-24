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

Route::get('/', 'WelcomeController@index');
Route::get('/about', 'WelcomeController@about');
Route::get('/services', 'WelcomeController@services');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/users', 'UserController@index');
Route::get('/users/register', 'UserController@registerByProxy')->name('admin.reg');
Route::get('/users/{user}', 'UserController@profile')->name('user_profile');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::put('/users/{user}/edit', 'UserController@update')->name('edit');
Route::get('/users/{user}/register', 'UserController@register')->name('users.reg');
Route::post('/users/{user}/register', 'PatientController@store')->name('reg-patient');
Route::put('/users/{user}/register', 'PatientController@update')->name('update');
Route::delete('/users/{user}', 'UserController@destroy')->name('delete');

Route::get('/patients', 'PatientController@index')->name('patients');
Route::get('/admin', 'PatientController@admin')->name('admin');
Route::get('/patients/{user}', 'PatientController@show')->name('profile');
Route::get('/prescription', 'PatientController@prescription');
Route::post('/changestatus/{user}','PatientController@changeStatus')->name('changestatus');
Route::get('patients/{user}/bio','PatientController@biodata')->name('biodata');

Route::get('/email', 'EmailController@index');
Route::post('/email', 'EmailController@send')->name('send-email');