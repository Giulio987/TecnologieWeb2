@extends('layouts.app')

@section('content')

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
            sssss
        </h1>
    </div>
    <div class="row row-space justify-content-center">
        <h5>
            Comdddddddddddddddddd.<button type="submit" name="submit" class="btn btn-outline-success btn-prenota font-weight-bold col-lg-2">+</button>
        </h5>
    </div>
    <form action="{{ URL::action('DoctorController@update', $doctor) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
        <?php
            $id = $doctor->id_user;
            $user = DB::table('users')->where('id', $id)->select('name', 'surname', 'email')->get();
            foreach ($user as $info) {
                $nome = $info->name;
                $cognome = $info->surname;
                $email = $info->email;
            }  
        ?>  
    <div class="row row-space justify-content-center border-form align-items-center">

    <div class="col-lg-5">
        <div class="row row-space justify-content-center">
        <div class="form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $nome }}">
            <small class="form-text text-muted">Modifica il nome del dottore</small>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <div class="row row-space justify-content-center">
        <div class="form-group">
          <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $cognome }}">
          <small class="form-text text-muted">Modifica il cognome del dottore</small>
            @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <div class="row row-space justify-content-center">
        <div class="form-group">
            <input type="text" class="form-control @error('fiscal_code') is-invalid @enderror" name="fiscal_code" value="{{ $doctor->fiscal_code }}">
            <small class="form-text text-muted">Modifica il codice fiscale del dottore</small>
            @error('fiscal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>
        </div>
        <div class="col-lg-5">
        <div class="row row-space justify-content-center">
        <div class="form-group">
            <input type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $doctor->gender }}">
            <small class="form-text text-muted">Modifica il sesso del dottore</small>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <div class="row row-space justify-content-center">
        <div class="form-group">
            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $doctor->dob }}">
            <small class="form-text text-muted">Modifica la data di nascita del dottore</small>
            @error('dob')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>
        <div class="row row-space justify-content-center">
        <div class="form-group">
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $doctor->phone_number }}">
            <small class="form-text text-muted">Modifica il telefono del dottore</small>
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>
        </div>
        <div class="row  justify-content-center" align="center">
        <div class="form-group"> 
            <select name="id_building" id="selUser">
                @foreach($buildings as $b)
                    <option value="{{$b->id}}">{{$b->id}} - {{$b->street_address }} - {{$b->street_number}} - {{$b->postal_code}} - {{$b->city}}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Modifica l'edificio di appartenenza</small>
            @error('id_building')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

    </form>    
</div>
        </div>


@endsection