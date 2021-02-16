<?php

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
    return view('welcome');
});

Auth::routes();

// Admin
Route::group(['middleware' => ['role:1']], function () {
    Route::resource('/home', 'HomeController');
    Route::resource('/doctor', 'HomeController');
    Route::resource('/patient', 'HomeController');
    Route::resource('/prescription', 'PrescriptionController');
    Route::resource('/visit', 'VisitController');
});

// Dottore
Route::group(['middleware' => ['role:2']], function () {
    Route::resource('/home', 'HomeController');
    Route::resource('/patient', 'HomeController');
    Route::resource('/prescription', 'PrescriptionController');
    Route::resource('/visit', 'VisitController');
});

// Paziente
Route::group(['middleware' => ['role:3']], function () {
    Route::resource('/home', 'HomeController');
    Route::resource('/prescription', 'PrescriptionController');
    Route::resource('/visit', 'VisitController');
});