<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use Log;
use App\Doctor;
use App\User;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::user()->role == '1') {
            $patients = Patient::all();
            return view('patient.index', compact('patients'));
        }
        else if ( Auth::user()->role == '2') {
            //fare in modo che i dottori vedano solo i pazienti corrispondenti
            $id = Auth::user()->id;
            $info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
			foreach ($info as $doctor) {
				$res = $doctor->id;
			}
            $patients = Patient::where('id_doctor', '=', $res)->get();
            return view('patient.index', compact('patients'));
        }else{
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
        $id = Auth::user()->id;
        $info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
		foreach ($info as $doctor) {
			$res = $doctor->id;
		}
        $patients = Patient::where('id_doctor', '=', $res)->get();
        return view('patient.create', compact('patients'));
    }

    protected function validatorPatient(array $data)
    {
        return Validator::make($data, [
            'name' 		         => ['required'],
            'surname'            => ['required'],
            'dob'                => ['required'],
            'phone_number'       => ['required'],
            'gender'             => ['required'],
            'fiscal_code'        => ['required'],
            'street_address'     => ['required'],
            'street_number'      => ['required'],
            'city'               => ['required'],
            'postal_code'        => ['required'],
            'email'              => ['required'],
            'id_doctor'          => ['required'],
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
        //la prima riga è sbagliata credo
        //in teoria no ma sotto dobbiamo usare la variabile nuova.
        //in che senso
        
        /*$validatedData = $request->validate([
            'name' 		         => ['required', 'string', 'max:20'],
            'surname'            => ['required', 'string', 'max:20'],
            'dob'                => ['required', 'date'],
            'phone_number'       => ['required', 'string', 'max:15', 'unique:patients'],
            'gender'             => ['required', 'string', 'max:1'],
            'fiscal_code'        => ['required', 'string', 'min:16', 'max:16','unique:patients'],
            'street_address'     => ['required', 'string', 'max:50'],
            'street_number'      => ['required', 'string', 'max:8'],
            'city'               => ['required', 'string', 'max:30'],
            'postal_code'        => ['required', 'string', 'max:5'],
            'email'              => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'id_doctor'          => ['required'],
        ]);*/
/*
        $name = $request->name;
        $surname = $request->surname;
        $dob = $request->dob;
        $gender = $request->gender;
        $fiscal_code = $request->fiscal_code;
        $street_address = $request->street_address;
        $street_number = $request->street_number;
        $city = $request->city;
        $postal_code = $request->postal_code;
        $email = $request->email;
        $password = $request->password;
        $id_doctor = $request->id_doctor;
        */
        //$nome = $input->name;
        //Patient::create($dob, $gender, $fiscal_code, $street_address, $street_number, $city, $postal_code);
        //User::create($name, $surname, $email, $password);
        $this->validatorPatient($request->all())->validate();
        $user = User::create([
            'name'          => $request->name,
            'surname'       => $request->surname,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role'          => '3',
        ]);  

        $id_user = $user->id;
        $id = Auth::user()->id;
        $info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
		foreach ($info as $doctor) {
			$res = $doctor->id;
		}
        Patient::create([
            'fiscal_code'   => $request->fiscal_code,
            'gender'        => $request->gender,
            'dob'           => $request->dob,
            'phone_number'  => $request->phone_number,
            'street_address' => $request->street_address,
            'street_number' => $request->street_number,
            'city'          => $request->city,
            'postal_code'   => $request->postal_code,
            'id_doctor'     => $res,
            'id_user'       => $id_user,
        ]);
        return redirect()->intended('/patient');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
