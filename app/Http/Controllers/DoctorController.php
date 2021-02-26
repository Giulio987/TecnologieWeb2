<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Building;
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
        $buildings = Building::all();
        return view('doctor.create', compact('buildings'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' 		         => 'required | string | max:20',
            'surname'            => 'required | string | max:20',
            'dob'                => 'required | date',
            'phone_number'       => 'required | numeric | max:15',
            'gender'             => 'required | string | max:1',
            'email'              => 'required | string | email | max:50',
            'password'           => 'required',
        ], [
            'name.required'           => 'Inserimento obbligatorio',
            'name.max'                => 'Il nome deve essere massimo di 20 caratteri',
            'surname.required'        => 'Inserimento obbligatorio',
            'surname.max'             => 'Il cognome deve essere massimo di 20 caratteri',
            'phone_number.required'   => 'Inserimento obbligatorio',
            'dob.required'            => 'Inserimento obbligatorio',
            'phone_number.numeric'    => 'Il numero di telefono deve essere composto solo da numeri',
            'phone_number.max'        => 'Il numero di telefono deve essere massimo di 15 caratteri',
            'gender.required'         => 'Inserimento obbligatorio', // custom message
            'gender.max'              => 'Il sesso deve essere massimo di un carattere', // custom message
            'fiscal_code.required'    => 'Inserimento obbligatorio',
            'fiscal_code.min'         => 'Il Codice Fiscale deve essere minimo di 16 caratteri',
            'fiscal_code.max'         => 'Il Codice Fiscale deve essere massimo di 16 caratteri',
            'fiscal_code.unique'      => 'Il Codice Fiscale inserito è già presente nel database.',
            'email.required'          => 'Inserimento obbligatorio',
            'email.string'            => 'L email deve essere una stringa.',
            'email.max'               => 'L email deve essere massimo di 50 caratteri',
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
            'role'          => '2',
        ]);  
        //recuperiamo l'id_user
        $id_user = $user->id;
        $id_building = "1";

        Doctor::create([
            'fiscal_code'   => $request->fiscal_code,
            'gender'        => $request->gender,
            'dob'           => $request->dob,
            'phone_number'  => $request->phone_number,
            'id_user'       => $id_user,
            'id_building'   => $id_building,
        ]);

        //messagges view per i messaggi 
        //poi vengono inclusi in layout
        if($user)
        {
            $br = "
            ";
            $request->session()->flash('success', 'Credenziali dottore:' . $br . 'Email:' . $request->email .$br.' Password:' . $request->password . $br . '. Aggiunto con successo');
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
        return view('doctor.edit', compact('doctor'));
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
        $this->validator($request->all())->validate();

        $input = $request->all();

        $user = User::find($doctor->id_user);
        $user->name = $input['name'];
        $user->surname = $input['surname'];
        $user->email = $input['email'];
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
