<?php

namespace App\Http\Controllers;

use App\Prescription;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Doctor;
use App\Patient; 
use Illuminate\Support\Facades\Validator;

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
            $prescriptions = Prescription::all();
            return view('prescription.index', compact('prescriptions'));
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

    protected function validatorPrescription(array $data)
    {
        return Validator::make($data, [
            'id_patient'     => ['required', 'integer'],
            'id_doctor'      => ['required', 'integer'],
            'description'    => ['required'],
            'status'         => ['required'],
            'date'           => ['required', 'date'],
            'type'           => ['required'],
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
        $this->validatorPrescription($request->all())->validate();
        $rfe = 0;
        if(Auth::user()->role == '2'){
            $rfedata = DB::table('prescriptions')->where('rfe','!=',0)->select('rfe')->get();
            foreach ($rfedata as $prescription) {
				$rfe = ($prescription->rfe + 1);
			}
        }
        $prescription = Prescription::create([
            'rfe'            => $rfe,
            'id_patient'     => $request->id_patient,
            'id_doctor'      => $request->id_doctor,
            'description'    => $request->description,
            'status'         => $request->status,
            'date'           => $request->date,
            'type'           => $request->type,
        ]);

        if($prescription)
        {
            if( Auth::user()->role == '2'){
                $request->session()->flash('success', 'Ricetta richiesta con successo');
            }else{
                $request->session()->flash('success', 'Ricetta prescritta con successo');
            }
        }else{
            $request->session()->flash('error', 'Si è verificato un problema nel prescrivere la ricetta, riprova.');
        }

        return redirect()->intended('/prescription');
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
    public function update(Request $request, Prescription $prescription, $status)
    {
        $input = $request->all();
        $rfedata = DB::table('prescriptions')->where('rfe','!=',0)->select('rfe')->get();
            foreach ($rfedata as $prescription) {
				$rfe = ($prescription->rfe + 1);
			}

        //$prescription->update($input); // procede all'aggiornamento massivo di tutti gli attributi presenti nell'array $input

        $prescription->rfe = $rfe;
        $prescription->rfe = $status;
        $prescription->description = $input['description'];
        $prescription->id_doctor = $input['id_doctor'];
        $prescription->id_patient = $input['id_patient'];
        $prescription->date = $input['date'];
        $prescription->type = $input['type'];
        $prescription->save();

        return redirect('/prescription');
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
