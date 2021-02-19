@extends('layouts.app')

@section('content')

    @if (!strcmp(Auth::user()->role, '1') || !strcmp(Auth::user()->role, '2'))
        <div class="container">
            <form action="{{ URL::action('PatientController@store') }}" method="POST" class="needs-validation" novalidate>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" name="name" required>
                </div>

                <div class="form-group">
                    <label for="surname">Cognome</label>
                    <input type="text" class="form-control" placeholder="Cognome" name="surname" required>
                </div>

                <div class="form-group">
                    <label for="dob">Data di nascita</label>
                    <input type="date" class="form-control" name="dob" required>
                </div>

                <div class="form-group">
                    <label for="gender">Sesso</label>
                    <input type="text" class="form-control" placeholder="Sesso" name="gender" required>
                </div>

                <div class="form-group">
                    <label for="fiscal_code">Codice Fiscale</label>
                    <input type="text" class="form-control" placeholder="Codice Fiscale" name="fiscal_code" required>
                </div>

                <div class="form-group">
                    <label for="street_address">Indirizzo Domicilio</label>
                    <input type="text" class="form-control" placeholder="Via/Viale/Piazza" name="street_address" required>
                </div>

                <div class="form-group">
                    <label for="street_number">Numero Civico</label>
                    <input type="text" class="form-control" placeholder="Numero civico" name="street_number" required>
                </div>

                <div class="form-group">
                    <label for="city">Città</label>
                    <input type="text" class="form-control" placeholder="Città" name="city" required>
                </div>

                <div class="form-group">
                    <label for="postal_code">Codice Postale</label>
                    <input type="text" class="form-control" placeholder="Codice Postale" name="postal_code" required>
                </div>

                <div class="form-group">
                    <label for="phone_number">Numero di Telefono</label>
                    <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                    <small id="email" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
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
    @endif
@endsection
