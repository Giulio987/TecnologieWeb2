@extends('layouts.app')

@section('content')

<div class="container">
    <h1> Modifica Le Informazioni Sul Dottore</h1>

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
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $nome }}">
            <small class="form-text text-muted">Modifica il nome del dottore</small>
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
            <label for="fiscal_code">Codice Fiscale</label>
            <input type="text" class="form-control @error('fiscal_code') is-invalid @enderror" name="fiscal_code" value="{{ $doctor->fiscal_code }}">
            <small class="form-text text-muted">Modifica il codice fiscale del dottore</small>
            @error('fiscal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="gender">Sesso</label>
            <input type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $doctor->gender }}">
            <small class="form-text text-muted">Modifica il sesso del dottore</small>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="dob">Data Di Nascita</label>
            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $doctor->dob }}">
            <small class="form-text text-muted">Modifica la data di nascita del dottore</small>
            @error('dob')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone_number">Telefono</label>
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $doctor->phone_number }}">
            <small class="form-text text-muted">Modifica il telefono del dottore</small>
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_building">Id Edificio</label>
            <select name="id_building" id="building">
                @foreach($buildings as $b)
                    <option value="{{$b->id}}">{{$b->id}} - {{$b->street_address }} - {{$b->street_number}} - {{$b->postal_code}} - {{$b->city}}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Modifica l'edificio di appartenenza</small>
            @error('id_building')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Aggiorna</button>

        <a href="{{ URL::action('DoctorController@index') }}" class="btn btn-secondary">Indietro</a>

    </form>    
</div>

<script type="application/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        $(document).ready(function() {
            $("#selUser").select2();
        });
    </script>

@endsection