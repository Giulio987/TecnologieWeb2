@extends('layouts.app')

@section('content')

<div class="row-space" style="margin-left:100px;float:left;">
<a href="{{ URL::action('BuildingController@index') }}">
<button style="background-color: #f8fafc;border-width: 0px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg>
</button>
</a>
</div>
<div class="container-lg" align="center">
<!--Row space mette spazio sopra e sotto -->
<div class="row row-space justify-content-center">
        <h1 class="font-weight-bold">
            Modifica le informazioni dell'edificio
        </h1>
    </div>

    
    <div class="row row-space justify-content-center">
        <h5>
            Compila tutti i campi e aggiungi l'edificio.
        </h5>
    </div> 
    <form action="{{ URL::action('BuildingController@update', $building) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}                                              <!--form blue e padding a 5-->
        <div class="row row-space justify-content-center align-items-center border-form py-5">
        
    <div class="col-lg-2">
            <input type="text" class="form-control @error('street_address') is-invalid @enderror" name="street_address" value="{{ $building->street_address }}">
                <small class="form-text text-muted">Modifica il nome della via</small>
                @error('street_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </div>
    <div class="col-lg-2">

            <input type="text" class="form-control @error('street_number') is-invalid @enderror" name="street_number" value="{{ $building->street_number }}">
          <small class="form-text text-muted">Modifica il numero civico</small>
            @error('street_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="col-lg-2">

            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ $building->postal_code }}">
            <small class="form-text text-muted">Modifica il codice postale </small>
            @error('postal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="col-lg-2">

            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $building->city }}">
            <small class="form-text text-muted">Modifica la città</small>
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>

        
        <div class="col-lg-2">

        <button type="submit" class="btn btn-outline-success confirmChange" style="float:right">Aggiorna
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle pl-2" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        </button>
        <small class="form-text text-muted" style="float:right">Clicca e modifica</small>

        </div>
        </div>
    </form>   
</div>

@endsection