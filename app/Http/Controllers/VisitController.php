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
			$visits = Visit::all();
            return view('visit.index', compact('visits'));
        }else if( Auth::user()->role == '2'){ // Dottore
            $id = Auth::user()->id;
			$info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
			foreach ($info as $doctor) {
				$res2 = $doctor->id;
			}
            $visits = Visit::where('id_doctor', $res2)->get();
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_patient'     => ['required', 'integer'],
            'id_doctor'      => ['required', 'integer'],
            'date'           => ['required', 'date'],
            'time'           => ['required'],
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

        $visit = Visit::create($input);

        if($visit)
        {
           $request->session()->flash('success', 'Visita prenotata con successo!');
            
        }else{
            $request->session()->flash('error', 'Si è verificato un problema nel prescrivere la ricetta, riprova.');
        }


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
        $doctor = DB::table('doctors')->where('id', $visit->id_doctor)->first();
        $user = DB::table('users')->where('id', $doctor->id_user)->first();
        $patient = DB::table('patients')->where('id_doctor', $visit->id_doctor)->get();
        return view('visit.edit', compact('user', 'patient', 'visit'));
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
        $this->validator($request->all())->validate();

        $input = $request->all();
        $visit->update($input);

        if($visit)
        {
           $request->session()->flash('success', 'Visita modificata con successo!');
            
        }else{
            $request->session()->flash('error', 'Si è verificato un problema nel modificare la visita, riprova.');
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
