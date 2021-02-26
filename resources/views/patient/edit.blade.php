@extends('layouts.app')

@section('content')

<div class="container">
    <h1> Modifica Le Informazioni Sul Paziente</h1>

    <form action="{{ URL::action('DoctorController@update', $patient) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
        <?php
            $id = $patient->id_user;
            $user = DB::table('users')->where('id', $id)->select('name', 'surname', 'email')->get();
            foreach ($user as $info) {
                $nome = $info->name;
                $cognome = $info->surname;
                $email = $info->email;
            }  
        ?>  
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $nome }}">
            <small class="form-text text-muted">Modifica Il nome del dottore</small>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
          <label for="surname">Cognome</label>
          <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $cognome }}">
          <small class="form-text text-muted">Modifica il cognome del dottore</small>
          @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email }}">
            <small class="form-text text-muted">Modifica il cognome del dottore</small>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        <div class="form-group">
            <label for="fiscal_code">Codice Fiscale</label>
            <input type="text" class="form-control @error('fiscal_code') is-invalid @enderror" name="fiscal_code" value="{{ $patient->fiscal_code }}">
            <small class="form-text text-muted">Modifica il codice fiscale del dottore</small>
            @error('fiscal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="gender">Sesso</label>
            <input type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $patient->gender }}">
            <small class="form-text text-muted">Modifica il sesso del dottore</small>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="dob">Data Di Nascita</label>
            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $patient->dob }}">
            <small class="form-text text-muted">Modifica la data di nascita del dottore</small>
            @error('dob')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone_number">Telefono</label>
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $patient->phone_number }}">
            <small class="form-text text-muted">Modifica il telefono del dottore</small>
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="street_address">Via/Viale/Piazza</label>
            <input type="text" class="form-control @error('street_address') is-invalid @enderror" name="street_address" value="{{ $patient->street_address }}">
            <small class="form-text text-muted">Modifica la via di appartenenza</small>
            @error('street_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="street_number">N°</label>
            <input type="text" class="form-control @error('street_number') is-invalid @enderror" name="street_number" value="{{ $patient->street_number }}">
            <small class="form-text text-muted">Modifica il numero civico</small>
            @error('street_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="postal_code">CAP</label>
            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ $patient->postal_code }}">
            <small class="form-text text-muted">Modifica il CAP</small>
            @error('postal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="city">Città</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $patient->city }}">
            <small class="form-text text-muted">Modifica il CAP</small>
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_doctor">Id Del Dottore</label>
            <input type="text" class="form-control @error('id_doctor') is-invalid @enderror" name="id_doctor" value="{{ $patient->id_doctor }}">
            <small class="form-text text-muted">Modifica il CAP</small>
            @error('id_doctor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
        
        <a href="{{ URL::action('VisitController@destroy', $patient) }}" class="btn btn-danger">Cancella</a>

        <a href="{{ URL::action('VisitController@index') }}" class="btn btn-secondary">Indietro</a>

    </form>    
</div>

@endsection