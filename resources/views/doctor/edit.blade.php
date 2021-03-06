@extends('layouts.app')

@section('content')

<div class="row-space" style="margin-left:100px;float:left;">
<a href="{{ URL::action('DoctorController@index') }}">
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
        Amministratore, modifica le informazioni riguardanti il dottore.
    </h1>
    </div>
    
    <div class="row row-space justify-content-center">
        <h5>
            Modifica i campi interessati.
        </h5>
    </div>
    <form action="{{ URL::action('DoctorController@update', $doctor) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
    <div class="row row-space justify-content-center border-form">
    <div class="col-lg-5">
            <div class="row row-space justify-content-center">
            <div class="form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
            <small class="form-text text-muted">Modifica il nome del dottore</small>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            </div>

            <div class="row row-space justify-content-center">
            <div class="form-group">
          <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $user->surname }}">
          <small class="form-text text-muted">Modifica il cognome del dottore</small>
            @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            </div>

            <div class="row row-space justify-content-center">
            <div class="form-group">
            <input type="text" class="form-control @error('fiscal_code') is-invalid @enderror" name="fiscal_code" value="{{ $doctor->fiscal_code }}" maxlength="16">
            <small class="form-text text-muted">Modifica il codice fiscale del dottore</small>
            @error('fiscal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            </div>

            <div class="row row-space justify-content-center">
            <div class="form-group">
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" maxlength="50">
            <small class="form-text text-muted">Modifica l'email del dottore</small>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            </div>
        </div>

        <div class="col-lg-5">
        <div class="row row-space justify-content-center">
        <div class="form-group">
            <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender" maxlength="1" autofocus>
                <option value="{{ $doctor->gender }}" selected>{{ $doctor->gender }}</option>
                    @if($doctor->gender == 'F')
                        <option value="M">M</option>
                    @else
                        <option value="F">F</option>
                    @endif
            </select>
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
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $doctor->phone_number }}" maxlength="15">
            <small class="form-text text-muted">Modifica il telefono del dottore</small>
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>
        <div class="row row-space justify-content-center">
        <div class="form-group ">
            <select id="selUser" name="id_building" for="id_building" class="@error('id_building') is-invalid @enderror selUser" style="width:100%">
                <option value="{{$doctor->id_building}}" selected="selected">{{ $building->id }} - {{ $building->street_address }}, {{ $building->street_number }} - {{ $building->city }}, {{ $building->postal_code }}</option>
                @foreach($buildings as $b)
                @if($b->id != $doctor->id_building)
                    <option value="{{$b->id}}">{{$b->id}} - {{$b->street_address }} - {{$b->street_number}} - {{$b->postal_code}} - {{$b->city}}</option>
                @endif
                @endforeach
            </select>
            <small class="form-text text-muted">Modifica l'ambulatorio</small>
            @error('id_building')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>
        </div>
        <div class="row justify-content-center">
        <button class="btn btn-outline-success col-lg-2 mt-4 confirmChange">Aggiorna
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle pl-2" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        </button>
        </div>
        </div>
    </form>    

</div>


@endsection