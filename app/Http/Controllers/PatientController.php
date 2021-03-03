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

use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::user()->role == '1') { // Admin
            $patients = Patient::all();
            return view('patient.index', compact('patients'));
        }
        else if ( Auth::user()->role == '2') { // Dottore
            //fare in modo che i dottori vedano solo i pazienti corrispondenti
            $id = Auth::user()->id;
            $name = Auth::user()->name;
            $doctor = DB::table('doctors')->where('id_user', $id)->first();
            $patients = Patient::where('id_doctor', $doctor->id)->get();
            return view('patient.index', compact('name', 'patients'));
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
            $doctors = Doctor::all(); // prende i dottori per la select2
            return view('patient.create', compact('doctors'));
        }elseif(Auth::user()->role == '2'){
            $id = Auth::user()->id;
            $name = Auth::user()->name;
            $doctor = DB::table('doctors')->where('id_user', $id)->select('id')->first();
            return view('patient.create', compact('doctor', 'name'));
        }
        else{
            return redirect('/home');
        }
    }

    protected function validatorCreate(array $data)
    {
        return Validator::make($data, [
            'name' 		         => ['required', 'string'],
            'surname'            => ['required', 'string'],
            'dob'                => ['required', 'date'],
            'phone_number'       => ['required', 'numeric', 'unique:patients'],
            'gender'             => ['required', 'string'],
            'fiscal_code'        => ['required', 'string', 'unique:patients'],
            'street_address'     => ['required', 'string'],
            'street_number'      => ['required', 'string'],
            'city'               => ['required', 'string'],
            'postal_code'        => ['required', 'numeric'],
            'id_doctor'          => ['required'],
            'email'              => ['required', 'string', 'email', 'unique:users'],
            'password'           => ['required'],
        ], [
            'name.required'           => 'Inserimento obbligatorio',
            'name.string'             => 'Deve essere composta da caratteri',
            'surname.required'        => 'Inserimento obbligatorio',
            'surname.string'          => 'Deve essere composta da caratteri',
            'dob.required'            => 'Inserimento obbligatorio',
            'dob.date'                => 'Deve essere di tipo data',
            'phone_number.required'   => 'Inserimento obbligatorio',
            'phone_number.numeric'    => 'Il numero di telefono deve essere composto solo da numeri',
            'phone_number.unique'     => 'Il numero di telefono inserito è già presente nel database.',
            'gender.required'         => 'Inserimento obbligatorio', // custom message
            'gender.string'           => 'Deve essere composta da caratteri',
            'fiscal_code.required'    => 'Inserimento obbligatorio',
            'fiscal_code.string'      => 'Deve essere composta da caratteri',
            'fiscal_code.unique'      => 'Il Codice Fiscale inserito è già presente nel database.',
            'street_address.required' => 'Inserimento obbligatorio',
            'street_address.string'   => 'Deve essere composta da caratteri',
            'street_number.required'  => 'Inserimento obbligatorio',
            'street_number.string'    => 'Deve essere composta da caratteri',
            'city.required'           => 'Inserimento obbligatorio',
            'city.string'             => 'Deve essere composta da caratteri',
            'postal_code.required'    => 'Inserimento obbligatorio',
            'postal_code.numeric'     => 'Deve essere composto da soli numeri.',
            'id_doctor.required'      => 'Inserimento obbligario',
            'email.required'          => 'Inserimento obbligatorio',
            'email.string'            => 'Deve essere composta da caratteri',
            'email.email'             => 'Deve essere un email @',
            'email.unique'            => 'L\'email inserita è già presente nel database.',
            'password.required'       => 'Inserimento obbligatorio',
        ]);
    }

    protected function validatorUpdate(array $data, Patient $patient)
    {   //in user prende id del paziente avente id_user che serve in unique di email
        $user = DB::table('users')->where('id', $patient->id_user)->first();

        return Validator::make($data, [
            'name' 		         => ['required', 'string'],
            'surname'            => ['required', 'string'],
            'dob'                => ['required', 'date'],  // regola
            'phone_number'       => ['required', 'numeric', Rule::unique('patients')->ignore($patient->id),],
            'gender'             => ['required', 'string'],
            'fiscal_code'        => ['required', 'string', Rule::unique('patients')->ignore($patient->id),],
            'street_address'     => ['required', 'string'],
            'street_number'      => ['required', 'string'],
            'city'               => ['required', 'string'],
            'postal_code'        => ['required', 'numeric'],
            'id_doctor'          => ['required'],
            'email'              => ['required', 'string', 'email', Rule::unique('users')->ignore($user->id),],
        ], [
            'name.required'           => 'Inserimento obbligatorio',
            'name.string'             => 'Deve essere composta da caratteri',
            'surname.required'        => 'Inserimento obbligatorio',
            'surname.string'          => 'Deve essere composta da caratteri',
            'dob.required'            => 'Inserimento obbligatorio',
            'dob.date'                => 'Deve essere di tipo data',
            'phone_number.required'   => 'Inserimento obbligatorio',
            'phone_number.numeric'    => 'Il numero di telefono deve essere composto solo da numeri',
            'phone_number.unique'     => 'Il numero di telefono inserito è già presente nel database.',
            'gender.required'         => 'Inserimento obbligatorio', // custom message
            'gender.string'           => 'Deve essere composta da caratteri',
            'fiscal_code.required'    => 'Inserimento obbligatorio',
            'fiscal_code.string'      => 'Deve essere composta da caratteri',
            'fiscal_code.unique'      => 'Il Codice Fiscale inserito è già presente nel database.',
            'street_address.required' => 'Inserimento obbligatorio',
            'street_address.string'   => 'Deve essere composta da caratteri',
            'street_number.required'  => 'Inserimento obbligatorio',
            'street_number.string'    => 'Deve essere composta da caratteri',
            'city.required'           => 'Inserimento obbligatorio',
            'city.string'             => 'Deve essere composta da caratteri',
            'postal_code.required'    => 'Inserimento obbligatorio',
            'postal_code.numeric'     => 'Deve essere composto da soli numeri.',
            'id_doctor.required'      => 'Inserimento obbligario',
            'email.required'          => 'Inserimento obbligatorio',
            'email.string'            => 'Deve essere composta da caratteri',
            'email.email'             => 'Deve essere un email @',
            'email.unique'            => 'L\'email inserita è già presente nel database.',
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
        $this->validatorCreate($request->all())->validate();

        $user = User::create([
            'name'          => $request->name,
            'surname'       => $request->surname,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role'          => '3',
        ]);  
        // se è admin prende l'id dal form di inserimento
        $res = $request->id_doctor;
        // si recupera l'id nella tabella user dell'utente appena creato
        $id_user = $user->id;
        // invece se è dottore il paziente viene associato a se stesso
        if(Auth::user()->role == '2'){//se è dottore prende il proprio id
            $id = Auth::user()->id;
            $info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
            foreach ($info as $doctor) {
                $res = $doctor->id;
            }
        }
        Patient::create([
            'fiscal_code'    => $request->fiscal_code,
            'gender'         => $request->gender,
            'dob'            => $request->dob,
            'phone_number'   => $request->phone_number,
            'street_address' => $request->street_address,
            'street_number'  => $request->street_number,
            'city'           => $request->city,
            'postal_code'    => $request->postal_code,
            'id_doctor'      => $res,
            'id_user'        => $id_user,
        ]);
        


        //messagges view per i messaggi 
        //poi vengono inclusi in layout
        if($user)
        {
            $request->session()->flash('success', 'Paziente ' . $request->surname . ' ' . $request->name . ' aggiunto con successo!');
        }else{
            $request->session()->flash('error', 'Si è verificato un errore nella registrazione, riprova.');
        }

        return redirect('/patient');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        if ( Auth::user()->role == '1') {
            //recuperiamo tutti i dottori
            $doctors = Doctor::all();
            
            //recuperiamo informazioni paziente dalla tabella users
            $user = User::where('id', $patient->id_user)->first();

            //recuperiamo dati dottore
            $hisDoctor = Doctor::where('id', $patient->id_doctor)->first();
            $userHisDoctor = DB::table('users')->where('id', $hisDoctor->id_user)->first();

            return view('patient.edit', compact('patient', 'doctors', 'userHisDoctor', 'user'));
        } else{
            return redirect('/home');
        }
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
        $this->validatorUpdate($request->all(), $patient)->validate();

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

        if($patient) // alert
        {
            $request->session()->flash('success', 'Paziente ' . $request->surname . ' ' . $request->name . ' modificato con successo!');
        }else{
            $request->session()->flash('error', 'Si è verificato un errore nella modifica, riprova.');
        }

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
