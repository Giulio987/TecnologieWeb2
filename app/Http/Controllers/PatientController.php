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
        if ( Auth::user()->role == '1') {
            $patients = Patient::all();
            return view('patient.create', compact('patients'));
        }elseif(Auth::user()->role == '2'){
            $id = Auth::user()->id;
            $info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
            foreach ($info as $doctor) {
                $res = $doctor->id;
            }
            $patients = Patient::where('id_doctor', '=', $res)->get();
            return view('patient.create', compact('patients'));
        }
        else{
            return redirect('/home');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' 		         => ['required', 'string', 'max:20'],
            'surname'            => ['required', 'string', 'max:20'],
            'dob'                => ['required', 'date'],
            'phone_number'       => ['required', 'numeric', 'max:15'],
            'gender'             => ['required', 'string', 'max:1'],
            'fiscal_code'        => ['required', 'string', 'min:16', 'max:16'],
            'street_address'     => ['required', 'string', 'max:50'],
            'street_number'      => ['required', 'string', 'max:8'],
            'city'               => ['required', 'string', 'max:30'],
            'postal_code'        => ['required', 'numeric', 'max:5'],
            'email'              => ['required', 'string', 'email', 'max:50'],
            'password'           => ['required'],
        ], [
            'name.required'           => 'Inserimento obbligatorio',
            'name.string'             => 'Deve essere composta da caratteri',
            'name.max'                => 'Impossibile inserire più di 20 caratteri',
            'surname.required'        => 'Inserimento obbligatorio',
            'surname.max'             => 'Impossibile inserire più di 20 caratteri',
            'surname.string'          => 'Deve essere composta da caratteri',
            'dob.required'            => 'Inserimento obbligatorio',
            'dob.date'                => 'Deve essere di tipo data',
            'phone_number.required'   => 'Inserimento obbligatorio',
            'phone_number.numeric'    => 'Il numero di telefono deve essere composto solo da numeri',
            'phone_number.max'        => 'Impossibile inserire più di 15 caratteri',
            //'phone_number.unique'     => 'Il numero di telefono inserito è già presente nel database.',
            'gender.required'         => 'Inserimento obbligatorio', // custom message
            'gender.string'           => 'Deve essere composta da caratteri',
            'gender.max'              => 'Impossibile inserire più di un carattere', // custom message
            'fiscal_code.required'    => 'Inserimento obbligatorio',
            'fiscal_code.string'      => 'Deve essere composta da caratteri',
            'fiscal_code.min'         => 'Inserire minimo 16 caratteri',
            'fiscal_code.max'         => 'Impossibile inserire più di 16 caratteri',
            //'fiscal_code.unique'      => 'Il Codice Fiscale inserito è già presente nel database.',
            'street_address.required' => 'Inserimento obbligatorio',
            'street_address.string'   => 'Deve essere composta da caratteri',
            'street_address.max'      => 'Impossibile inserire più di 50 caratteri',
            'street_number.required'  => 'Inserimento obbligatorio',
            'street_number.string'    => 'Deve essere composta da caratteri',
            'street_number.max'       => 'Impossibile inserire più di 8 caratteri',
            'city.required'           => 'Inserimento obbligatorio',
            'city.string'             => 'Deve essere composta da caratteri',
            'city.max'                => 'Impossibile inserire più di 30 caratteri',
            'postal_code.required'    => 'Inserimento obbligatorio',
            'postal_code.numeric'     => 'Deve essere composto da soli numeri.',
            'postal_code.max'         => 'Impossibile inserire più di 5 caratteri',
            'email.required'          => 'Inserimento obbligatorio',
            'email.string'            => 'Deve essere composta da caratteri',
            'email.email'             => 'Deve essere un email @',
            'email.max'               => 'Impossibile inserire più di 50 caratteri',
            //'email.unique'            => 'L\'email inserita è già presente nel database.',
            'password.required'       => 'Inserimento obbligatorio',

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

        $user = User::create([
            'name'          => $request->name,
            'surname'       => $request->surname,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role'          => '3',
        ]);  
        //se è admin va scritto espèlicitamente
        $res = $request->id_doctor;
        $id_user = $user->id;
        //se è dottore il paziente viene associato a se stesso
        if(Auth::user()->role == '2'){
            $id = Auth::user()->id;
            $info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
            foreach ($info as $doctor) {
                $res = $doctor->id;
            }
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
        


        //messagges view per i messaggi 
        //poi vengono inclusi in layout
        if($user)
        {
            $br = "
            ";
            $request->session()->flash('success', 'Credenziali paziente:' . $br . 'Email:' . $request->email .$br.' Password:' . $request->password . $br . '. Aggiunto con successo');
        }else{
            $request->session()->flash('error', 'Si è verificato un errore nella registrazione, riprova.');
        }

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
        $doctors = Doctor::all();
        return view('patient.edit', compact('patient', 'doctors'));
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
        $this->validator($request->all())->validate();

        $input = $request->all();

        $user = User::find($patient->id_user);
        $user->name = $input['name'];
        $user->surname = $input['surname'];
        $user->email = $input['email'];
        $user->save();

        $patient->fiscal_code = $input['fiscal_code'];
        $patient->gender = $input['gender'];
        $patient->dob = $input['dob'];
        $patient->street_address = $input['street_address'];
        $patient->street_number = $input['street_number'];
        $patient->postal_code = $input['postal_code'];
        $patient->city = $input['city'];
        $patient->id_doctor = $input['id_doctor'];
        $patient->phone_number = $input['phone_number'];
        $patient->save();

        return redirect('/patient');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        
        return redirect('/patient');
    }
}
