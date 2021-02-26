@extends('layouts.app')

@section('content')

<?php
$name = Auth::user()->name;
?>

<div class="row-space" style="margin-left:100px;float:left;">
<a href="{{ URL::action('HomeController@index') }}">
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
            Crea un profilo per un dottore, successivamente potrà accedere alla piattaforma.
        </h4>
    </div>
    <div class="row row-space justify-content-center">
        <h5>
            Compila tutti i campi e crea il tuo nuovo dottore.
        </h5>
    </div>

        <div class="container">
            <form action="{{ URL::action('DoctorController@store') }}" method="POST"  novalidate>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nome" name="name" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="surname">Cognome</label>
                    <input type="text" class="form-control @error('surname') is-invalid @enderror" placeholder="Cognome" name="surname" required>
                    @error('surname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dob">Data di nascita</label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" required>
                    @error('dob')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gender">Sesso</label>
                    <input type="text" class="form-control @error('gender') is-invalid @enderror" placeholder="Sesso" name="gender" required>
                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fiscal_code">Codice Fiscale</label>
                    <input type="text" class="form-control @error('fiscal_code') is-invalid @enderror" placeholder="Codice Fiscale" name="fiscal_code" required>
                    @error('fiscal_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_building">Edificio</label><br>
                    <select name="id_building" id="building">
                        @foreach($buildings as $b)
                            <option value="{{$b->id}}">{{$b->id}} - {{$b->street_address }} - {{$b->street_number}} - {{$b->postal_code}} - {{$b->city}}</option>
                        @endforeach
                    </select>
                    @error('id_building')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="postal_code">Codice Postale</label>
                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Codice Postale" name="postal_code" required>
                    @error('postal_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number">Numero di Telefono</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number" required>
                    @error('phone_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                    <small id="email" class="form-text text-muted"></small>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
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