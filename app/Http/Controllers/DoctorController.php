<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Building;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Auth::user()->role == '1') {
            $doctors = Doctor::all();
            return view('doctor.index', compact('doctors'));
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
            $buildings = Building::all();
            return view('doctor.create', compact('buildings'));
        }
        else{
            return redirect('/home');
        }
    }

    protected function validatorCreate(array $data)
    {
        return Validator::make($data, [
            'name' 		         => ['required', 'string', 'max:20'],
            'surname'            => ['required', 'string', 'max:20'],
            'dob'                => ['required', 'date'],
            'phone_number'       => ['required', 'numeric'],
            'gender'             => ['required', 'string', 'max:1'],
            'fiscal_code'        => ['required', 'min:16', 'max:16'],
            'id_building'        => ['required'],
            'email'              => ['required', 'string', 'email', 'unique:users'],
            'password'           => ['required'],
        ], [
            'name.required'           => 'Inserimento obbligatorio',
            'name.string'             => 'Deve essere composto da caratteri',
            'name.max'                => 'Impossibile inserire più di 20 caratteri',
            'surname.string'          => 'Deve essere composto da caratteri',
            'surname.required'        => 'Inserimento obbligatorio',
            'surname.max'             => 'Impossibile inserire più di 20 caratteri',
            'dob.required'            => 'Inserimento obbligatorio',
            'dob.date'                => 'Deve essere una data',
            'phone_number.required'   => 'Inserimento obbligatorio',
            'phone_number.numeric'    => 'Deve essere composto solo da numeri',
            'gender.required'         => 'Inserimento obbligatorio', // custom message
            'gender.string'           => 'Deve essere composto da caratteri',
            'gender.max'              => 'Impossibile inserire più di un carattere', // custom message
            'fiscal_code.required'    => 'Inserimento obbligatorio',
            'fiscal_code.min'         => 'Inserire minimo 16 caratteri',
            'fiscal_code.max'         => 'Impossibile inserire più di 16 caratteri',
            'id_building.required'    => 'Inserimento obbligatorio',
            'email.required'          => 'Inserimento obbligatorio',
            'email.string'            => 'Deve essere composta da caratteri',
            'email.email'             => 'Deve essere un email @',
            'email.unique'            => 'L\'email inserita è già presente nel database.',
            'password.required'       => 'Inserimento obbligatorio',

        ]);
    }

    protected function validatorUpdate(array $data, Doctor $doctor)
    {
        return Validator::make($data, [
            'name' 		         => ['required', 'string'],
            'surname'            => ['required', 'string'],
            'dob'                => ['required', 'date'],
            'phone_number'       => ['required', 'numeric', Rule::unique('doctors')->ignore($doctor->id)],
            'gender'             => ['required', 'string'],
            'fiscal_code'        => ['required', Rule::unique('doctors')->ignore($doctor->id),],
            'id_building'        => ['required'],
        ], [
            'name.required'           => 'Inserimento obbligatorio',
            'name.string'             => 'Deve essere composto da caratteri',
            'surname.string'          => 'Deve essere composto da caratteri',
            'surname.required'        => 'Inserimento obbligatorio',
            'dob.required'            => 'Inserimento obbligatorio',
            'dob.date'                => 'Deve essere una data',
            'phone_number.required'   => 'Inserimento obbligatorio',
            'phone_number.numeric'    => 'Deve essere composto solo da numeri',
            'phone_number.unique'     => 'Il numero di telefono inserito è già presente nel database.',
            'gender.required'         => 'Inserimento obbligatorio', // custom message
            'gender.string'           => 'Deve essere composto da caratteri',
            'fiscal_code.required'    => 'Inserimento obbligatorio',
            'fiscal_code.unique'      => 'Il Codice Fiscale inserito è già presente nel database.',
            'id_building.required'    => 'Inserimento obbligatorio',

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
            'role'          => '2',
        ]);  
        //recuperiamo l'id_user
        $id_user = $user->id;
        Doctor::create([
            'fiscal_code'   => $request->fiscal_code,
            'gender'        => $request->gender,
            'dob'           => $request->dob,
            'phone_number'  => $request->phone_number,
            'id_user'       => $id_user,
            'id_building'   => $request->id_building,
            'id_user'       => $id_user,
        ]);

        //messagges view per i messaggi 
        //poi vengono inclusi in layout
        if($user)
        {
            $br = "
            ";
            $request->session()->flash('success', 'Dottore ' . $request->surname . ' ' . $request->name . ' creato con successo');
        }else{
            $request->session()->flash('error', 'Si è verificato un errore nella registrazione, riprova.');
        }

        return redirect('/doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $buildings = Building::all();
        return view('doctor.edit', compact('doctor', 'buildings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $this->validatorUpdate($request->all(), $doctor)->validate();

        $input = $request->all();
        $user = User::find($doctor->id_user);
        $user->name = $input['name'];
        $user->surname = $input['surname'];
        $user->save();

        $doctor->fiscal_code = $input['fiscal_code'];
        $doctor->gender = $input['gender'];
        $doctor->dob = $input['dob'];
        $doctor->phone_number = $input['phone_number'];
        $doctor->id_building = $input['id_building'];
        $doctor->save();

        return redirect('/doctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        
        return redirect('/doctor');
    }
}
