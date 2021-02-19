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
			
        }else if( Auth::user()->role == '2'){ // Dottore
            $prescriptions = Prescription::all();
            return view('prescription.index', compact('prescriptions'));
        } else if(Auth::user()->role == '3'){
			$id = Auth::user()->id;
			$info = DB::table('patients')->where('id_user', $id)->select('id')->get();
			foreach ($info as $patient) {
				$res2 = $patient->id;
			}
            $prescriptions = Prescription::where('id_patient', $res2)->get();
            return view('prescription.index', compact('prescriptions'));
        }else{
            return redirect('login');
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
            $patient = Patient::where('id_doctor', '=', Auth::user()->id)->get();
            
            return view('prescription.create', compact('patient'));
        } else {
            return view('prescription.create');
        }

    }

    protected function validatorPrescription(array $data)
    {
        return Validator::make($data, [
            'id_user'        => ['required', 'integer'],
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
        Prescription::create([
            'id_user'        => $request->id_user,
            'id_doctor'      => $request->id_doctor,
            'description'    => $request->description,
            'status'         => $request->status,
            'date'           => $request->date,
            'type'           => $request->type,

        ]);
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
