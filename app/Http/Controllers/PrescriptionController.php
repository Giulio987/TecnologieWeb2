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
            $name = Auth::user()->name;
			$doctor = DB::table('doctors')->where('id_user', $id)->first();
            $prescriptions = Prescription::where('id_doctor', $doctor->id)->where('status', 'convalidata')->get()->sortByDesc('rfe');
            return view('prescription.index', compact('name', 'prescriptions'));
        } else{
            //Pazienti che visualizzeranno solo le proprie ricette
			$id = Auth::user()->id;
            $name = Auth::user()->name;
			$patient = DB::table('patients')->where('id_user', $id)->first();
            $prescriptions = Prescription::where('id_patient', $patient->id)->get()->sortByDesc('rfe');
            return view('prescription.index', compact('name', 'prescriptions'));
        }
    }

    public function indexValidate()
    {
        if( Auth::user()->role == '2'){ // Dottore
            //Dottori visualizzeranno solo le ricette dei propri pazienti
            $id = Auth::user()->id;
            $name = Auth::user()->name;
			$doctor = DB::table('doctors')->where('id_user', $id)->first();
            $prescriptions = Prescription::where('id_doctor', $doctor->id)->where('status', 'convalidare')->get();
            return view('prescription.index-validate', compact('name', 'prescriptions'));
        } else{
            return redirect('/home');
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
            $doctor = DB::table('doctors')->where('id_user', $id)->first();
            $patients = Patient::where('id_doctor', $doctor->id)->get();
            return view('prescription.create', compact('doctor', 'patients'));
        } else {
            return view('prescription.create');
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_patient'     => ['required', 'integer'],
            'id_doctor'      => ['required', 'integer'],
            'description'    => ['required'],
            'status'         => ['required'],
            'date'           => ['required', 'date'],
            'type'           => ['required'],
        ], [
            'id_patient.required'     => 'Inserimento obbligatorio',
            'id_patient.integer'      => 'L\'id del paziente deve essere un intero',
            'id_doctor.required'      => 'Inserimento obbligatorio',
            'id_doctor.integer'       => 'L\'id del dottore deve essere un intero',
            'description.required'    => 'Inserisci una descrizione',
            'status.required'         => 'Inserimento obbligatorio',
            'date.required'           => 'Inserimento obbligatorio',
            'date.date'               => 'La data deve essere di tipo data',
            'type.required'           => 'Seleziona la tipologia di ricetta',
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
                $request->session()->flash('success', 'Ricetta prescritta con successo!');
            }else{
                $request->session()->flash('success', 'Ricetta richiesta con successo!');
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
        $this->validator($request->all())->validate();
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
            $request->session()->flash('success', 'Ricetta convalidata con successo!');
        }else{
            DB::table('prescriptions')->where('id', $id)->update(['status' => $prescription->rfe = $input['status']]);
            $request->session()->flash('success', 'Ricetta invalidata.');
        }

        return redirect('/prescription-validate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        
        return redirect('/prescription');
    }
}
