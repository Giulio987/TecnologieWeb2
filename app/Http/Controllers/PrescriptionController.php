<?php

namespace App\Http\Controllers;

use App\Prescription;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Doctor;
use App\Patient; 
class PrescriptionController extends Controller
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
            //Dottori visualizzeranno solo le ricette dei propri pazienti
            $id = Auth::user()->id;
			$info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
			foreach ($info as $doctor) {
				$res = $doctor->id;
			}
            $prescriptions = Prescription::where('id_doctor', $res)->get();
            return view('prescription.index', compact('prescriptions'));
        } else{
            //Pazienti che visualizzeranno solo le proprie ricette
			$id = Auth::user()->id;
			$info = DB::table('patients')->where('id_user', $id)->select('id')->get();
			foreach ($info as $patient) {
				$res = $patient->id;
			}
            $prescriptions = Prescription::where('id_patient', $res)->get();
            return view('prescription.index', compact('prescriptions'));
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
            $id = Auth::user()->id;
            $info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
			foreach ($info as $doctor) {
				$res = $doctor->id;
			}
            $patient = Patient::where('id_doctor', '=', $res)->get();
            return view('prescription.create', compact('patient'));
        } else {
            return view('prescription.create');
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

        Prescription::create($input);


        return redirect('/prescription');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
