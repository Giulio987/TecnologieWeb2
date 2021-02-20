<?php

namespace App\Http\Controllers;

use App\Visit;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Doctor;
use App\Patient;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::user()->role == '1'){ // Admin
			
        }else if( Auth::user()->role == '2'){ // Dottore
            $visits = Visit::all();
            return view('visit.index', compact('visits'));
        } else {
			$id = Auth::user()->id;
			$info = DB::table('patients')->where('id_user', $id)->select('id')->get();
			foreach ($info as $patient) {
				$res2 = $patient->id;
			}
            $visits = Visit::where('id_patient', $res2)->get();
            return view('visit.index', compact('visits'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::user()->role == '1'){ // Admin
            
        }
        else if( Auth::user()->role == '2'){ // Dottore
            $doctor = Doctor::all();
            $patient = Patient::all();
            return view('visit.create', compact('patient', 'doctor'));
        } else {
            return view('visit.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request -> all();

        Visit::create($input);


        return redirect('/visit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        $visit->delete();
        
        return redirect('/visit');
    }
}
