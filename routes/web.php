<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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
    return view('welcome');
});

Route::get('/employee', 'EmployeeController@index');
Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employee/add', 'EmployeeController@store');
Route::get('/employee/edit/{id}', 'EmployeeController@edit');
Route::get('/employee/show/{id}', 'EmployeeController@show');
Route::post('/employee/update/{id}', 'EmployeeController@update');
Route::get('/employee/delete/{id}', 'EmployeeController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
