@extends('layouts.app')

@section('content')

<?php
$name = Auth::user()->name;
?>

@if(!strcmp(Auth::user()->role, '2'))
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
      Ciao Dott. {{ $name }}, crea una nuova prescrizione.
    </h1>
  </div>
  <div class="row row-space justify-content-center">
    <h4>
    Seleziona la tipologia della prescrizione, inserisci il farmaco o visita specialistica e seleziona il paziente.
    </h4>
  </div>
  <form action="{{ URL::action('PrescriptionController@store') }}" method="POST">
    {{ csrf_field() }}

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="row justify-content-center col-lg-4 " style="margin:0.5em;">
      <h6 class="alert alert-danger alert-error">{{ '*' . $error  }}</h6>
    </div>
    @endforeach
    @endif

    <div class="row row-space justify-content-center">
    <div class="btn-group btn-group-toggle justify-content-center w-100 h-100" data-toggle="buttons">
      <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
        <input type="radio" name="type" id="ShowFarmaco" value="farmaco">
        <h4 class="font-weight-bold" style="padding:1em;">Farmaco</h4>
      </label>
      <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
        <input type="radio" name="type" id="ShowVisita" value="visita">
        <h4 class="font-weight-bold" style="padding:1em;">Visita</h4>
      </label>
      </div>
    </div>
    <div class="py-5 row row-space justify-content-center align-items-center">
      <div class="col-lg-6" style="display:none" id="contentUser">
        <select id="selUser" name="id_patient" style="width:70%"> 
          @foreach ($patients as $p)
          <?php
          $user = DB::table('users')->where('id', $p->id_user)->first();
          ?>
          <option value="{{ $p->id }}">{{ $user->surname }} - {{ $user->name }} - {{ $p->fiscal_code }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-lg-6" id="contentFarmaco" style="display:none">
        <div>
          <label class="label-ricetta">
            <input type="text" class="label-ricetta text-uppercase ShowBtn" placeholder="Inserisci farmaco" class="form-control @error('description') is-invalid @enderror" id="descriptionFarmaco">
          </label>
        </div>
      </div>

      <div class="col-lg-6" id="contentVisita" style="display:none">
        <div>
          <label class="label-ricetta">
            <input type="text" class="label-ricetta text-uppercase ShowBtn" placeholder="Inserisci visita" class="form-control @error('description') is-invalid @enderror" id="descriptionVisita">
          </label>
        </div>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-outline-success col-lg-2 BtnPrenota" style="display:none">Prescrivi
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle pl-2" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        </button>

    <input id="id_doctor" name="id_doctor" type="hidden" value="{{ $doctor->id }}">
    <input id="status" name="status" type="hidden" value="convalidata">
    <input id="date" name="date" type="hidden" value="{{ date('Y-m-d') }}">
  </form>
</div>

@endif

@if(!strcmp(Auth::user()->role, '3'))
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
      Ciao {{ $name }}, richiedi le tue prescrizioni.
    </h1>
  </div>
  <div class="row row-space justify-content-center">
    <h4>
      Richiedi prescrizioni relative ai farmaci o visite specialistiche al tuo dottore.
    </h4>
  </div>
  <form action="{{ URL::action('PrescriptionController@store') }}" method="POST">
    {{ csrf_field() }}
    <div class="row row-space justify-content-center">
      <h5>
        Seleziona la tipologia della prescrizione e inserisci il farmaco o visita specialistica. 
      </h5>
    </div>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="row justify-content-center col-lg-4 " style="margin:0.5em;">
      <h6 class="alert alert-danger alert-error">{{ '*' . $error  }}</h6>
    </div>
    @endforeach
    @endif

    <div class="row row-space justify-content-center">
    <div class="btn-group btn-group-toggle justify-content-center w-100 h-100" data-toggle="buttons">
      <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
        <input type="radio" name="type" id="ShowFarmaco" value="farmaco">
        <h4 class="font-weight-bold" style="padding:1em;">Farmaco</h4>
      </label>
      <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
        <input type="radio" name="type" id="ShowVisita" value="visita">
        <h4 class="font-weight-bold" style="padding:1em;">Visita</h4>
      </label>
      </div>
    </div>

    <div class="pt-5 row row-space justify-content-center col-lg-6">
      <div id="contentFarmaco" style="display:none">
        <div>
          <label class="label-ricetta">
            <input type="text" class="label-ricetta text-uppercase ShowBtn" placeholder="Inserisci farmaco" class="form-control @error('description') is-invalid @enderror" id="descriptionFarmaco">
          </label>
        </div>
      </div>
      <div id="contentVisita" style="display:none">
        <div>
          <label class="label-ricetta">
            <input type="text" class="label-ricetta text-uppercase ShowBtn" placeholder="Inserisci visita" class="form-control @error('description') is-invalid @enderror" id="descriptionVisita">
          </label>
        </div>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-outline-success col-lg-2 BtnPrenota" style="display:none">Richiedi
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle pl-2" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
    </button>

    <?php
    $id = Auth::user()->id;
    $patient = DB::table('patients')->where('id_user', $id)->first();
    ?>
    <input id="id_doctor" name="id_doctor" type="hidden" value="{{ $patient->id_doctor }}">
    <input id="id_patient" name="id_patient" type="hidden" value="{{ $patient->id }}">
    <input id="status" name="status" type="hidden" value="convalidare">
    <input id="date" name="date" type="hidden" value="{{ date('Y-m-d') }}">
  </form>
</div>
@endif
@endsection