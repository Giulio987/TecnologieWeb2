<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Doctor;
use App\User;
use App\Patient;


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
            $doctor = DB::table('doctors')->where('id_user', $id)->first();
            return view('personal_area.index', compact('doctor'));
        }else if ( Auth::user()->role == '3') {
            //prendo i dati del paziente loggato e del suo medico curante
            $id = Auth::user()->id;
            $patient = DB::table('patients')->where('id_user', $id)->get();
            foreach($patient as $p)
            {
                $res = $p->id_doctor;
            }
            $doctor = DB::table('doctors')->where('id', $res)->get();
            return view('personal_area.index', compact('patient', 'doctor'));
        }
    }
}
