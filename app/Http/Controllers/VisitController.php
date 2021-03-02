<?php

namespace App\Http\Controllers;

use App\Visit;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Doctor;
use App\Patient;
use Illuminate\Support\Facades\Validator;

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
			$visits = Visit::all()->sortBy('date');// ordina dalla più vicina
            $doctors = Doctor::where('id', $visit->id_doctor)->get();
            $patients = Patient::where('id', $visit->id_patient)->get();
            return view('visit.index', compact('visits', 'doctors', 'patients'));
        }else if( Auth::user()->role == '2'){ // Dottore
            $id = Auth::user()->id;
            $name = Auth::user()->name;
			$doctor = DB::table('doctors')->where('id_user', $id)->first();
            $visits = Visit::where('id_doctor', $doctor->id)->get()->sortBy('date');
            return view('visit.index', compact('name', 'visits'));
        } else { // Paziente
			$id = Auth::user()->id;
            $name = Auth::user()->name;
			$patient = DB::table('patients')->where('id_user', $id)->first();
            $visits = Visit::where('id_patient', $patient->id)->get()->sortBy('time')->sortBy('date');
            return view('visit.index', compact('name', 'visits'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::user()->role == '3'){ // Paziente
            $name = Auth::user()->name;
            $id = Auth::user()->id;
            $patient = Patient::where('id_user', $id)->first();
            return view('visit.create', compact('name', 'patient'));
        } else { // Non sei loggato come Paziente
            return redirect('/home');
        }
    }

    protected function validator(array $data) // validator Create
    {
        return Validator::make($data, [
            'id_patient'              => ['required', 'integer'],
            'id_doctor'               => ['required', 'integer'],
            'date'                    => ['required', 'date'],
            'time'                    => ['required'],
        ], [
            'id_patient.required'     => 'Inserimento obbligatorio',
            'id_patient.integer'      => 'L\'id del paziente deve essere un intero',
            'id_doctor.required'      => 'Inserimento obbligatorio',
            'id_doctor.integer'       => 'L\'id del dottore deve essere un intero',
            'date.required'           => 'Seleziona una data',
            'date.date'               => 'La data deve essere di tipo data',
            'time.required'           => 'Seleziona un orario',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $input = $request -> all();

        $visit = Visit::create($input); // Mass Assignment

        if($visit)
        {                       // alert
           $request->session()->flash('success', 'Visita prenotata con successo!');
            
        }else{                  // alert
            $request->session()->flash('error', 'Si è verificato un problema nel prescrivere la ricetta, riprova.');
        }


        return redirect('/visit');
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
