@extends('layouts.app')

@section('content')

    @if (!strcmp(Auth::user()->role, '1') || !strcmp(Auth::user()->role, '2'))

@if (!strcmp(Auth::user()->role, '1'))
<div class="row-space" style="margin-left:100px;float:left;">
<a href="{{ URL::action('PatientController@index') }}">
<button style="background-color: #f8fafc;border-width: 0px;" href="">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg>
  </button>
</a>
</div>
@endif
@if (!strcmp(Auth::user()->role, '2'))
<div class="row-space" style="margin-left:100px;float:left;">
<a href="{{ URL::action('HomeController@index') }}">
<button style="background-color: #f8fafc;border-width: 0px;" href="">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg>
  </button>
</a>
</div>
@endif
<div class="container-lg" align="center">
    <div class="row row-space justify-content-center">
        <h1 class="font-weight-bold">
            @if(!strcmp(Auth::user()->role, '1'))
            Amministratore, registra un nuovo paziente.
            @elseif(!strcmp(Auth::user()->role, '2'))
            Ciao Dott. {{ $name }}, registra i tuoi pazienti.
            @endif
        </h1>
    </div>
    <div class="row row-space justify-content-center">
        <h4>
            @if(!strcmp(Auth::user()->role, '1'))
            Inserisci tutti i campi richiesti per registrare un nuovo paziente.
            @elseif(!strcmp(Auth::user()->role, '2'))
            Inserisci tutti i campi richiesti per registrare un tuo nuovo paziente.
            @endif
        </h4>
    </div>
    <form action="{{ URL::action('PatientController@store') }}" method="POST"  novalidate>
    {{ csrf_field() }}

    <div class="row row-space justify-content-center">
        <h5>
        @if(!strcmp(Auth::user()->role, '1'))
        Compila tutti i campi e crea un nuovo paziente.
        @elseif(!strcmp(Auth::user()->role, '2'))
        Compila tutti i campi e crea il tuo nuovo paziente.
        @endif
        </h5>
    </div>

    <input type="hidden" name="id_doctor" value="{{ Auth::user()->id }}">

    <div class="row row-space justify-content-center border-form">

    <div class="col-lg-4">
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
            <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" maxlength="1" autofocus>
                                <option value="" disabled selected>Seleziona la tua opzione...</option>
                                <option value="m">M</option>
                                <option value="f">F</option>
                                </select>                @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        @if(!strcmp(Auth::user()->role, '1'))
        <div class="row row-space justify-content-center">
                <div class="form-group label-space">
                <select name="id_doctor" id="selUser" style="width:100%">
                        @foreach($doctors as $d)
                        <?php
                            $user = DB::table('users')->where('id', $d->id_user)->first();
                        ?>
                            <option value="{{$d->id}}">{{$user->surname}} {{$user->name}} - {{ $d->fiscal_code }}</option>
                        @endforeach
                    </select>
                    @error('id_doctor')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        @endif
        
    </div>

            
            <div class="col-lg-4">
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
                    <input type="text" class="form-control @error('street_address') is-invalid @enderror" placeholder="Via/Viale/Piazza" name="street_address" required>
                    @error('street_address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="row row-space justify-content-center">

                <div class="form-group label-space">
                    <input type="text" class="form-control @error('street_number') is-invalid @enderror" placeholder="Numero civico" name="street_number" required>
                    @error('street_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="row row-space justify-content-center">
                <div class="form-group label-space">
                    <input type="text" class="form-control @error('city') is-invalid @enderror" placeholder="Città" name="city" required>
                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>
</div>

        <div class="col-lg-4">
        <div class="row row-space justify-content-center">
                <div class="form-group label-space">
                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Codice Postale" name="postal_code" maxlength="5" required>
                    @error('postal_code')
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
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
</div>
        <div class="row row-space justify-content-center">
                <div class="form-group label-space">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
</div>
</div>
<button class="btn btn-outline-success col-lg-2">Registra<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle pl-2" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></button>
</div>       

            </form>
        </div>

      

    @endif
@endsection