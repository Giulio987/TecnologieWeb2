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
            <input type="text" class="form-control" name="name" value="{{ $nome }}">
            <small class="form-text text-muted">Modifica Il nome del dottore</small>
        </div>
        <div class="form-group">
          <label for="surname">Cognome</label>
          <input type="text" class="form-control" name="surname" value="{{ $cognome }}">
          <small class="form-text text-muted">Modifica il cognome del dottore</small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $email }}">
            <small class="form-text text-muted">Modifica il cognome del dottore</small>
          </div>
        <div class="form-group">
            <label for="fiscal_code">Codice Fiscale</label>
            <input type="text" class="form-control" name="fiscal_code" value="{{ $patient->fiscal_code }}">
            <small class="form-text text-muted">Modifica il codice fiscale del dottore</small>
        </div>
        <div class="form-group">
            <label for="gender">Sesso</label>
            <input type="text" class="form-control" name="gender" value="{{ $patient->gender }}">
            <small class="form-text text-muted">Modifica il sesso del dottore</small>
        </div>
        <div class="form-group">
            <label for="dob">Data Di Nascita</label>
            <input type="date" class="form-control" name="dob" value="{{ $patient->dob }}">
            <small class="form-text text-muted">Modifica la data di nascita del dottore</small>
        </div>
        <div class="form-group">
            <label for="phone_number">Telefono</label>
            <input type="text" class="form-control" name="phone_number" value="{{ $patient->phone_number }}">
            <small class="form-text text-muted">Modifica il telefono del dottore</small>
        </div>
        <div class="form-group">
            <label for="street_address">Via/Viale/Piazza</label>
            <input type="text" class="form-control" name="street_address" value="{{ $patient->street_address }}">
            <small class="form-text text-muted">Modifica la via di appartenenza</small>
        </div>
        <div class="form-group">
            <label for="street_number">N°</label>
            <input type="text" class="form-control" name="street_number" value="{{ $patient->street_number }}">
            <small class="form-text text-muted">Modifica il numero civico</small>
        </div>
        <div class="form-group">
            <label for="postal_code">CAP</label>
            <input type="text" class="form-control" name="postal_code" value="{{ $patient->postal_code }}">
            <small class="form-text text-muted">Modifica il CAP</small>
        </div>
        <div class="form-group">
            <label for="city">Città</label>
            <input type="text" class="form-control" name="city" value="{{ $patient->city }}">
            <small class="form-text text-muted">Modifica il CAP</small>
        </div>
        <div class="form-group">
            <label for="id_doctor">Id Del Dottore</label>
            <input type="text" class="form-control" name="id_doctor" value="{{ $patient->id_doctor }}">
            <small class="form-text text-muted">Modifica il CAP</small>
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
        
        <a href="{{ URL::action('VisitController@destroy', $patient) }}" class="btn btn-danger">Cancella</a>

        <a href="{{ URL::action('VisitController@index') }}" class="btn btn-secondary">Indietro</a>

    </form>    
</div>

@endsection