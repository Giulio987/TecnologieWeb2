<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Doctor;
use App\User;
use App\Patient;
use App\Building;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');
    }

    public function indexPersonalArea()
    {
        if ( Auth::user()->role == '1') {
            //prendo i dati del'admin loggato
            $id = Auth::user()->id;
            $admin = DB::table('users')->where('id', $id)->first();
            return view('personal_area.index', compact('admin'));
        }
        else if ( Auth::user()->role == '2') {
            //prendo i dati del dottore loggato
            $id = Auth::user()->id;
            $user = DB::table('users')->where('id', $id)->first();
            $doctor = DB::table('doctors')->where('id_user', $id)->first();
            $patients = Patient::where('id_doctor', '=', $doctor->id)->count();
            $building = Building::where('id', '=', $doctor->id_building)->first();
            return view('personal_area.index', compact('user', 'doctor', 'building', 'patients'));
        }else if ( Auth::user()->role == '3') {
            //prendo i dati del paziente loggato e del suo medico curante
            $user = DB::table('users')->where('id', Auth::user()->id)->first();
            $patient = DB::table('patients')->where('id_user', $user->id)->first();
            $doctor = DB::table('doctors')->where('id', $patient->id_doctor)->first();
            $userDoctor = DB::table('users')->where('id', $doctor->id_user)->first();
            $building = Building::where('id', '=', $doctor->id_building)->first();
            return view('personal_area.index', compact('user', 'patient', 'doctor', 'userDoctor', 'building'));
        }
    }
}
