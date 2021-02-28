<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Doctor;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'           => ['required', 'string', 'max:20'],
            'surname'        => ['required', 'string', 'max:20'],
            'email'          => ['required', 'email', 'max:50', 'unique:users'],
            'password'       => ['required', 'string', 'min:8', 'confirmed'],
            'role'           => ['required', 'string'],
            'fiscal_code'    => ['required', 'string', 'min:16', 'max:16'],
            'gender'         => ['required', 'string', 'max:1'],
            'dob'            => ['required', 'date'],
            'phone_number'   => ['required', 'numeric'],
            'id_building'    => ['required'],
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
            'email.email'             => 'Deve essere un email',
            'email.max'               => 'Impossibile inserire più di 50 caratteri',
            'email.unique'            => 'Email già presente',
            'password.required'       => 'Inserire password',
            'password.min'            => 'Inserisci minimo 8 caratteri',
            'password.confirmed'      => 'La conferma della password non corrisponde'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'          => $data['name'],
            'surname'       => $data['surname'],
            'email'         => $data['email'],
            'password'      => Hash::make($data['password']),
            'role'          => $data['role'],
        ]);  
        $id_user = $user->id;

        $doctor = Doctor::create([
            'fiscal_code'   => $data['fiscal_code'],
            'gender'        => $data['gender'],
            'dob'           => $data['dob'],
            'phone_number'  => $data['phone_number'],
            'id_building'   => $data['id_building'],
            'id_user'       => $id_user,
        ]);

        return $user;
    }
}
