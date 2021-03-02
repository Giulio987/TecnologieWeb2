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


Route::get('home', 'HomeController@index'); // middleware auth si trova nel costruttore
Route::get('/personal-area', 'HomeController@indexPersonalArea'); // middleware auth si trova nel costruttore
//Doctor
Route::resource('doctor', 'DoctorController')->except(['destroy', 'show'])->middleware('auth');
Route::get('/doctor/{doctor}/delete', 'DoctorController@destroy')->middleware('auth');
//Patient
Route::resource('patient', 'PatientController')->except(['destroy', 'show'])->middleware('auth');
Route::get('/patient/{patient}/delete', 'PatientController@destroy')->middleware('auth');
//Prescription
Route::resource('prescription', 'PrescriptionController')->except(['destroy', 'show', 'edit'])->middleware('auth');
Route::get('/prescription-validate', 'PrescriptionController@indexValidate')->middleware('auth');
Route::get('/prescription/{prescription}/delete', 'PrescriptionController@destroy')->middleware('auth');
//Visit
Route::resource('visit', 'VisitController')->except(['destroy', 'show', 'edit', 'update'])->middleware('auth');
Route::get('/visit/{visit}/delete', 'VisitController@destroy')->middleware('auth');
//Building
Route::resource('building', 'BuildingController')->except(['show', 'create'])->middleware('auth');

                            