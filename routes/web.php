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


Route::get('home', 'HomeController@index')->middleware('role'); 
Route::resource('doctor', 'DoctorController')->middleware('role');
Route::resource('doctor', 'DoctorController')->except(['destroy'])->middleware('role');
Route::get('/doctor/{doctor}/delete', 'DoctorController@destroy')->middleware('role');
Route::resource('patient', 'PatientController')->middleware('role');
Route::resource('prescription', 'PrescriptionController')->middleware('role');
Route::resource('visit', 'VisitController')->except(['destroy'])->middleware('role');
Route::get('/visit/{visit}/delete', 'VisitController@destroy')->middleware('role');
Route::resource('building', 'BuildingController')->middleware('role');
Route::get('/prescriptionValidate', 'PrescriptionController@indexValidate')->middleware('role');


/*// Admin
Route::group(['middleware' => ['role:1']], function () {
    Route::resource('home', 'HomeController');
    Route::resource('doctor', 'DoctorController');
    Route::resource('patient', 'PatientController');
    Route::resource('prescription', 'PrescriptionController');
    Route::resource('visit', 'VisitController');
});

// Dottore
Route::group(['middleware' => ['role:2']], function () {
    Route::resource('home', 'HomeController');
    Route::resource('doctor', 'DoctorController');
    Route::resource('patient', 'PatientController');
    Route::resource('prescription', 'PrescriptionController');
    Route::resource('visit', 'VisitController');
});

// Paziente
Route::group(['middleware' => ['role:3']], function () {
    Route::resource('home', 'HomeController');
    Route::resource('doctor', 'DoctorController');
    Route::resource('patient', 'PatientController');
    Route::resource('prescription', 'PrescriptionController');
    Route::resource('visit', 'VisitController');
});
*/