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
            $prescriptions = Prescription::where('id_doctor', $res)->where('status', 'convalidata')->get();
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

    public function indexValidate()
    {
        if( Auth::user()->role == '2'){ // Dottore
            //Dottori visualizzeranno solo le ricette dei propri pazienti
            $id = Auth::user()->id;
			$info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
			foreach ($info as $doctor) {
				$res = $doctor->id;
			}
            $prescriptions = Prescription::where('id_doctor', $res)->where('status', 'convalidare')->get();
            return view('prescription.indexValidate', compact('prescriptions'));
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
                $request->session()->flash('success', 'Ricetta prescritta con successo');
            }else{
                $request->session()->flash('success', 'Ricetta richiesta con successo');
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
    public function update(Request $request, Prescription $prescription)
    {
        $input = $request->all();
        //recupara l'ultimo rfe inserito e lo incrementa di uno
        $rfedata = DB::table('prescriptions')->where('rfe','!=',0)->select('rfe')->get();
            foreach ($rfedata as $prescription) {
				$rfe = ($prescription->rfe + 1);
			}

        //recuperiamo l'id della ricetta
        $id = $input['id'];
        //se lo stato è convalidata allora assegna rfe, altrimenti cambia solo lo stato in negata
        if($input['status'] == 'convalidata')
        {
            DB::table('prescriptions')->where('id', $id)->update(['rfe' => $prescription->rfe = $rfe, 'status' => $prescription->rfe = $input['status']]);
            $request->session()->flash('success', 'Ricetta convalidata con successo');
        }else{
            DB::table('prescriptions')->where('id', $id)->update(['status' => $prescription->rfe = $input['status']]);
            $request->session()->flash('success', 'Ricetta invalidata');
        }

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
