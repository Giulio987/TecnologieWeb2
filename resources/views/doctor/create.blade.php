@extends('layouts.app')

@section('content')

<?php
$name = Auth::user()->name;
?>

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
            Amministratore, registra un nuovo dottore.
        </h1>
    </div>
    <div class="row row-space justify-content-center">
        <h4>
        Inserisci tutti i campi richiesti per registrare un nuovo dottore.
        </h4>
    </div>
    <form action="{{ URL::action('DoctorController@store') }}" method="POST"  novalidate>
    {{ csrf_field() }}
    <div class="row row-space justify-content-center">
        <h5>
            Compila tutti i campi e crea un nuovo dottore.
        </h5>
    </div>
    <div class="row row-space justify-content-center border-form align-items-center">

    <div class="col-lg-5">
        <div class="row row-space justify-content-center">
                <div class="form-group label-space">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nome" name="name" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="row row-space justify-content-center">

                <div class="form-group label-space">
                    <input type="text" class="form-control @error('surname') is-invalid @enderror" placeholder="Cognome" name="surname" required>
                    @error('surname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="row row-space justify-content-center">

                <div class="form-group label-space">
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" required>
                    @error('dob')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="row row-space justify-content-center">

                <div class="form-group label-space">
                    <input type="text" class="form-control @error('gender') is-invalid @enderror" placeholder="Sesso" name="gender" maxlength="1" required>
                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
            </div>

            
            <div class="col-lg-5">
        <div class="row row-space justify-content-center">
                <div class="form-group label-space">
                    <input type="text" class="form-control @error('fiscal_code') is-invalid @enderror" placeholder="Codice Fiscale" name="fiscal_code" maxlength="16" required>
                    @error('fiscal_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        
        <div class="row row-space justify-content-center">

                <div class="form-group label-space">
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number" maxlength="15" required>
                    @error('phone_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="row row-space justify-content-center">
        <div class="form-group label-space">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                    <small id="email" class="form-text text-muted"></small>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="row row-space justify-content-center">
                <div class="form-group label-space">
                <select name="id_building" id="selUser">
                        @foreach($buildings as $b)
                            <option value="{{$b->id}}">{{$b->id}} - {{$b->street_address }} - {{$b->street_number}} - {{$b->postal_code}} - {{$b->city}}</option>
                        @endforeach
                    </select>
                    @error('id_building')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        </div>
        <div class="row justify-content-center">

                <div class="form-group label-space col-lg-4">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="row justify-content-center">

        <button class="btn btn-outline-success col-lg-2 mt-4">Registra<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle pl-2" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></button>
</div>

</div>
</div>
</div>       

            </form>
        </div>

@endsection