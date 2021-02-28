@extends('layouts.app')

@section('content')

<div class="row-space" style="margin-left:100px;float:left;">
<a href="{{ URL::action('PatientController@index') }}">
<button style="background-color: #f8fafc;border-width: 0px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg>
  </button>
</a>
</div>
<div class="container-lg" align="center">
<div class="row row-space justify-content-center">
        <h1 class="font-weight-bold">
            dsds
        </h1>
    </div>

    <form action="{{ URL::action('PatientController@update', $patient) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
    <div class="row row-space justify-content-center">
        <h5>
            Compila tutti i campi e crea il tuo nuovo paziente.<button id="confirmChange" type="submit" name="submit" class="btn btn-outline-success btn-prenota font-weight-bold col-lg-2">+</button>
        </h5>
    </div>
    
        <?php
            $id = $patient->id_user;
            $user = DB::table('users')->where('id', $id)->select('name', 'surname', 'email')->get();
            foreach ($user as $info) {
                $nome = $info->name;
                $cognome = $info->surname;
                $email = $info->email;
            }  
        ?>  
        <div class="row row-space justify-content-center border-form">

<div class="col-lg-4">
    <div class="row row-space justify-content-center">
            <div class="form-group label-space">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $nome }}">
                <small class="form-text text-muted">Modifica il nome</small>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    </div>
    <div class="row row-space justify-content-center">

            <div class="form-group label-space">
            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $cognome }}">
          <small class="form-text text-muted">Modifica il cognome</small>
            @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    </div>
    <div class="row row-space justify-content-center">

            <div class="form-group label-space">
            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $patient->dob }}">
            <small class="form-text text-muted">Modifica la data di nascita</small>
            @error('dob')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    </div>
    <div class="row row-space justify-content-center">

            <div class="form-group label-space">
            <input type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $patient->gender }}">
            <small class="form-text text-muted">Modifica il sesso</small>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    </div>
        </div>

        
        <div class="col-lg-4">
    <div class="row row-space justify-content-center">
            <div class="form-group label-space">
            <input type="text" class="form-control @error('fiscal_code') is-invalid @enderror" name="fiscal_code" value="{{ $patient->fiscal_code }}">
            <small class="form-text text-muted">Modifica il codice fiscale</small>
            @error('fiscal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    </div>
    <div class="row row-space justify-content-center">
            <div class="form-group label-space">
            <input type="text" class="form-control @error('street_address') is-invalid @enderror" name="street_address" value="{{ $patient->street_address }}">
            <small class="form-text text-muted">Modifica l'indirizzo di domicilio</small>
            @error('street_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    </div>
    <div class="row row-space justify-content-center">

            <div class="form-group label-space">
            <input type="text" class="form-control @error('street_number') is-invalid @enderror" name="street_number" value="{{ $patient->street_number }}">
            <small class="form-text text-muted">Modifica il numero civico</small>
            @error('street_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    </div>
    <div class="row row-space justify-content-center">
            <div class="form-group label-space">
            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $patient->city }}">
            <small class="form-text text-muted">Modifica la città</small>
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    </div>
</div>

    <div class="col-lg-4">
    <div class="row row-space justify-content-center">
            <div class="form-group label-space">
            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ $patient->postal_code }}">
            <small class="form-text text-muted">Modifica il CAP</small>
            @error('postal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    </div>

    <div class="row row-space justify-content-center">
                <div class="form-group label-space">
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $patient->phone_number }}">
            <small class="form-text text-muted">Modifica il telefono</small>
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    </div>
    <div class="row row-space justify-content-center">
                <div class="form-group label-space">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email }}">
            <small class="form-text text-muted">Modifica l'email</small>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    </div>
    <div class="row row-space justify-content-center">

        <div class="form-group label-space">
            <select id="selUser" name   ="id_doctor" for="id_doctor" class="@error('id_doctor') is-invalid @enderror selUser">
                <?php
                    $doctor = DB::table('doctors')->where('id', $patient->id_doctor)->select('id_user')->get();
                    foreach ($doctor as $info) {
                        $id_user = $info->id_user;
                    }
                    $user = DB::table('users')->where('id', $id_user)->select('name', 'surname')->get();
                    foreach ($user as $info) {
                        $nome = $info->name;
                        $cognome = $info->surname;
                    }
                ?>
                <option value="{{$patient->id_doctor}}" selected="selected">{{ $nome }} - {{ $cognome }}</option>
                @foreach($doctors as $d)
                <?php
                    $user = DB::table('users')->where('id', $d->id_user)->select('name', 'surname')->get();
                    foreach ($user as $info) {
                        $nome = $info->name;
                        $cognome = $info->surname;
                    }
                ?>
                @if($d->id != $patient->id_doctor)
                    <option value="{{$d->id}}">{{ $nome }} - {{ $cognome }}</option>
                @endif
                @endforeach
            </select>
            <small class="form-text text-muted">Modifica il dottore che ha in cura questo paziente</small>
            @error('id_doctor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
                </div>
                </div>



    </form>    
</div>

@endsection