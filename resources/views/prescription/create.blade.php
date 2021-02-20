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
    <h1 class="font-weight-bold col-lg-11">
      Ciao Dott. {{ $name }}, crea le tue prescrizioni.
    </h1>
  </div>
  <div class="row row-space justify-content-center">
    <h4>
      Crea prescrizioni relative ai farmaci o visite specialistiche per i tuoi pazienti.
    </h4>
  </div>
  <form action="{{ URL::action('PrescriptionController@store') }}" method="POST">
    {{ csrf_field() }}
    <div class=" row row-space justify-content-center">
      <h5>
        Seleziona il tipo, paziente, indica farmaco o visita e crea la prescrizione per il tuo paziente.<button type="submit" name="submit" class="btn btn-outline-success btn-prenota font-weight-bold col-lg-2">+</button>
      </h5>
    </div>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="row justify-content-center col-lg-4" style="margin:0.5em;">
      <h6 class="alert alert-danger alert-error">{{ '*' . $error  }}</h6>
    </div>
    @endforeach
    @endif
    <div class="row row-space justify-content-center">
    <div class="btn-group btn-group-toggle justify-content-center" data-toggle="buttons">
      <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
        <input type="radio" name="type" id="type1" value="farmaco" onclick="ShowFarmaco()" style="display:none">
        <h4 class="font-weight-bold" style="padding:1em;">Farmaco</h4>
      </label>
      <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
        <input type="radio" name="type" id="type2" value="visita" onclick="ShowVisita()" style="display:none">
        <h4 class="font-weight-bold" style="padding:1em;">Visita</h4>
      </label>
      </div>
    </div>
    <div class="pt-5 row row-space justify-content-center align-items-center">
      <div class="col-lg-6" style="display:none" id="contentUser">
        <select id="selUser" name="id_patient" style="width:500px;height:auto;">
          @foreach ($patient as $patient)
          <?php
          $user = DB::table('users')->where('id', $patient->id_user)->select('name', 'surname')->get();
          foreach ($user as $info) {
            $nome = $info->name;
            $cognome = $info->surname;
          }
          ?>
          <option value="{{ $patient->id }}">{{ $cognome }} - {{ $nome }} - {{ $patient->fiscal_code }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-lg-6" id="contentFarmaco" style="display:none">
        <div>
          <label class="label-ricetta">
            <input type="text" class="label-ricetta text-uppercase" placeholder="Inserisci farmaco" class="form-control" id="descriptionFarmaco">
          </label>
        </div>
      </div>
      <div class="col-lg-6" id="contentVisita" style="display:none">
        <div>
          <label class="label-ricetta">
            <input type="text" class="label-ricetta text-uppercase" placeholder="Inserisci visita" class="form-control" id="descriptionVisita">
          </label>
        </div>
      </div>
    </div>

    <?php
    $id = Auth::user()->id;
    $info = DB::table('doctors')->where('id_user', $id)->select('id')->get();
    foreach ($info as $doctor) {
      $res = $doctor->id;
    }
    ?>

    <input id="id_doctor" name="id_doctor" type="hidden" value="{{ $res }}">
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
    <h1 class="font-weight-bold col-lg-11">
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
        Seleziona il tipo,indica il farmaco o visita e richiedi la prescrizione al tuo dottore.<button type="submit" name="submit" class="btn btn-outline-success btn-prenota font-weight-bold col-lg-2">+</button>
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
        <input type="radio" name="type" id="type1" value="farmaco" onclick="ShowFarmaco()" style="display:none">
        <h4 class="font-weight-bold" style="padding:1em;">Farmaco</h4>
      </label>
      <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
        <input type="radio" name="type" id="type2" value="visita" onclick="ShowVisita()" style="display:none">
        <h4 class="font-weight-bold" style="padding:1em;">Visita</h4>
      </label>
      </div>
    </div>

    <div class="pt-5 row row-space justify-content-center col-lg-6">
      <div id="contentFarmaco" style="display:none">
        <div>
          <label class="label-ricetta">
            <input type="text" class="label-ricetta text-uppercase" placeholder="Inserisci farmaco" class="form-control" id="descriptionFarmaco">
          </label>
        </div>
      </div>
      <div id="contentVisita" style="display:none">
        <div>
          <label class="label-ricetta">
            <input type="text" class="label-ricetta text-uppercase" placeholder="Inserisci visita" class="form-control" id="descriptionVisita">
          </label>
        </div>
      </div>
    </div>

    <?php
    $id = Auth::user()->id;
    $info = DB::table('patients')->where('id_user', $id)->select('id_doctor', 'id')->get();
    foreach ($info as $patient) {
      $res1 = $patient->id_doctor;
      $res2 = $patient->id;
    }

    ?>
    <input id="id_doctor" name="id_doctor" type="hidden" value="{{ $res1 }}">
    <input id="id_patient" name="id_patient" type="hidden" value="{{ $res2 }}">
    <input id="status" name="status" type="hidden" value="convalidare">
    <input id="date" name="date" type="hidden" value="{{ date('Y-m-d') }}">
  </form>
</div>
@endif
@endsection