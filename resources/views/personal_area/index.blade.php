@extends('layouts.app')

@section('content')


@if(!strcmp(Auth::user()->role, '1'))

<div class="row-space" style="margin-left:100px;float:left;">
<a href="{{ URL::action('DoctorController@index') }}">
<button style="background-color: #f8fafc;border-width: 0px;" href="">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg>
  </button>
</a>
</div>
<div class="container-lg" align="center">
    <div class="row row-space justify-content-center">
        <h1 class="font-weight-bold">
                Ciao Amministratore {{ $admin->name }}, ti presento la tua area personale.
            
        </h1>
    </div>
    
    <div class="row row-space justify-content-center border-form align-items-center">


    <div class="col-lg-4">
        <div class="row row-space justify-content-center">

        <p class="text-uppercase font-weight-bold">Nome</p>

        </div>
        <div class="row row-space justify-content-center">

        <p class="text-uppercase font-weight-bold">Cognome</p>

        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Email</p>
   
        </div>
    </div>

            
    <div class="col-lg-4">
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $admin->name }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $admin->surname }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $admin->email }}</p>
        </div>
    </div>
</div>
</div>   

@endif

@if(!strcmp(Auth::user()->role, '2'))

<div class="row-space" style="margin-left:100px;float:left;">
<a href="{{ URL::action('DoctorController@index') }}">
<button style="background-color: #f8fafc;border-width: 0px;" href="">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg>
  </button>
</a>
</div>
<div class="container-lg" align="center">
    <div class="row row-space justify-content-center">
        <h1 class="font-weight-bold">
            Ciao Dott. {{ $user->name }}, ti presento la tua area personale.
        </h1>
    </div>
    
    <div class="row row-space justify-content-center border-form align-items-center">


    <div class="col-lg-4">
        <div class="row row-space justify-content-center">
                <p class="text-uppercase font-weight-bold">Codice Fiscale</p>
        </div>
        <div class="row row-space justify-content-center">

        <p class="text-uppercase font-weight-bold">Nome</p>

        </div>
        <div class="row row-space justify-content-center">

        <p class="text-uppercase font-weight-bold">Cognome</p>

        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Email</p>
   
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Sesso</p>  
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Data di nascita</p>

                
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Numero di telefono</p>

                
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Ambulatorio</p>

                
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Numero pazienti</p>

                
        </div>
    </div>

            
    <div class="col-lg-4">
        <div class="row row-space justify-content-center">
            <p class="text-uppercase">{{ $doctor->fiscal_code }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $user->name }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $user->surname }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $user->email }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $doctor->gender}}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ date('d/m/Y', strtotime($doctor->dob)) }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $doctor->phone_number }}</p>
        </div>
        <div class="row row-space justify-content-center"> 
            <p class="text-uppercase">{{ $building->street_address }}, {{ $building->street_number }} - {{ $building->city }} - {{ $building->postal_code }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $patients }}</p>
        </div>
    </div>
</div>
</div>       


@endif
@if(!strcmp(Auth::user()->role, '3'))

<div class="row-space" style="margin-left:100px;float:left;">
<a href="{{ URL::action('DoctorController@index') }}">
<button style="background-color: #f8fafc;border-width: 0px;" href="">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg>
  </button>
</a>
</div>
<div class="container-lg" align="center">
    <div class="row row-space justify-content-center">
        <h1 class="font-weight-bold">
            Ciao Dott. {{ $user->name }}, ti presento la tua area personale.
        </h1>
    </div>
    
    <div class="row row-space justify-content-center border-form align-items-center">


    <div class="col-lg-4">
        <div class="row row-space justify-content-center">
                <p class="text-uppercase font-weight-bold">Codice Fiscale</p>
        </div>
        <div class="row row-space justify-content-center">

        <p class="text-uppercase font-weight-bold">Nome</p>

        </div>
        <div class="row row-space justify-content-center">

        <p class="text-uppercase font-weight-bold">Cognome</p>

        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Email</p>
   
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Sesso</p>  
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Data di nascita</p>

                
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Numero di telefono</p>

                
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Indirizzo Domicilio</p>

                
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Dottore</p>

                
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Ambulatorio</p>

                
        </div>
        <div class="row row-space justify-content-center">
        <p class="text-uppercase font-weight-bold">Numero di Telefono Dottore</p>

                
        </div>
    </div>

            
    <div class="col-lg-4">
        <div class="row row-space justify-content-center">
            <p class="text-uppercase">{{ $patient->fiscal_code }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $user->name }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $user->surname }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $user->email }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $patient->gender}}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ date('d/m/Y', strtotime($patient->dob)) }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $patient->phone_number }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $patient->street_address }}, {{ $patient->street_number }} - {{ $patient->city }} - {{ $patient->postal_code }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $userDoctor->name }} {{ $userDoctor->surname }}</p>
        </div>
        <div class="row row-space justify-content-center"> 
            <p class="text-uppercase">{{ $building->street_address }}, {{ $building->street_number }} - {{ $building->city }} - {{ $building->postal_code }}</p>
        </div>
        <div class="row row-space justify-content-center">    
            <p class="text-uppercase">{{ $doctor->phone_number }}</p>
        </div>
    </div>
</div>
</div>

 @endif
@endsection