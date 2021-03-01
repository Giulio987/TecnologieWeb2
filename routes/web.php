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
Route::get('/personal-area', 'HomeController@indexPersonalArea')->middleware('role');
//Doctor
Route::resource('doctor', 'DoctorController')->except(['destroy', 'show'])->middleware('role');
Route::get('/doctor/{doctor}/delete', 'DoctorController@destroy')->middleware('role');
//Patient
Route::resource('patient', 'PatientController')->except(['destroy', 'show'])->middleware('role');
Route::get('/patient/{patient}/delete', 'PatientController@destroy')->middleware('role');
//Prescription
Route::resource('prescription', 'PrescriptionController')->except(['destroy', 'show', 'edit'])->middleware('role');
Route::get('/prescription-validate', 'PrescriptionController@indexValidate')->middleware('role');
Route::get('/prescription/{prescription}/delete', 'PrescriptionController@destroy')->middleware('role');
//Visit
Route::resource('visit', 'VisitController')->except(['destroy', 'show', 'edit', 'update'])->middleware('role');
Route::get('/visit/{visit}/delete', 'VisitController@destroy')->middleware('role');
//Building
Route::resource('building', 'BuildingController')->except(['show'])->middleware('role');
