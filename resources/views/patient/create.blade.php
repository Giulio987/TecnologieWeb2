@extends('layouts.app')

@section('content')

    @if (!strcmp(Auth::user()->role, '1') || !strcmp(Auth::user()->role, '2'))
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
            @if(!strcmp(Auth::user()->role, '1'))
            Amministratore, visualizza tutti i pazienti.
            @elseif(!strcmp(Auth::user()->role, '2'))
            Ciao Dott. {{ $name }}, crea i tuoi pazienti.
            @endif
        </h1>
    </div>
    <div class="row row-space justify-content-center">
        <h4>
            Crea un profilo per un tuo paziente, successivamente potrà accedere alla piattaforma.
        </h4>
    </div>
    <div class="row row-space justify-content-center">
        <h5>
            Compila tutti i campi e crea il tuo nuovo paziente.
        </h5>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <form action="{{ URL::action('PatientController@store') }}" method="POST" class="needs-validation" novalidate>
                {{ csrf_field() }}
                <div class="form-row row-space justify-content-center py-4">
                    <div class="col-lg-3 mx-4">
                    <input type="text" class="label-patient text-uppercase" placeholder="Nome" name="name" required>
                    </div>
                    <div class="col-lg-3 mx-4">
                    <input type="text" class="label-patient text-uppercase" placeholder="Cognome" name="surname" required>
                    </div>
                    <div class="col-lg-3 mx-4">
                    <input type="text" class="label-patient text-uppercase" placeholder="Codice Fiscale" name="fiscal_code" required>
                </div>
                </div>

                <div class="form-row row-space justify-content-center py-4">
                

                    <div class="col-lg-2 mx-4">
                    <input type="date" class="label-patient text-uppercase" name="dob" required>

                    </div>
                    <div class="col-lg-1 mx-4">
                    <input type="text" class="label-patient text-uppercase" placeholder="Sesso" name="gender" required>
                    </div>
                    <div class="col-lg-2 mx-4">
                    <input type="text" class="label-patient text-uppercase" placeholder="Phone Number" name="phone_number" required>

                    </div>
                </div>
               


                
                <div class="form-row row-space justify-content-center py-4">
                    <div class="col-lg-4 mx-4">
                    <input type="text" class="label-patient text-uppercase" placeholder="Via/Viale/Piazza" name="street_address" required>

                    </div>
                    <div class="col-lg-1 mx-4">
                    <input type="text" class="label-patient text-uppercase" placeholder="N. civico" name="street_number" required>
                    </div>
                    <div class="col-lg-2 mx-4">
                    <input type="text" class="label-patient text-uppercase" placeholder="Città" name="city" required>
                    </div>
                    <div class="col-lg-1 mx-4">
                    <input type="text" class="label-patient text-uppercase" placeholder="CAP" name="postal_code" required>
                    </div>
                    @if(Auth::user()->role == '1')
                        <div class="col-lg-1 mx-4">
                            <input type="text" name="id_doctor" class="label-patient text-uppercase" placeholder="Dottore" required>
                        </div>
                    @endif
                </div>
                <div class="form-row row-space justify-content-center py-4">
                    <div class="col-lg-3 mx-4">
                    <input type="email" class="label-patient text-uppercase" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                    </div>
                    <div class="col-lg-3 mx-4">
                    <input type="password" class="label-patient text-uppercase" id="password" placeholder="Password" name="password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Conferma</button>
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
        
    </script>
    @endif
@endsection
