@extends('layouts.app')

@section('content')
<?php 
$time = array('08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00');
$timeSabato = array('08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30');

function giornoData($d, $m, $a)
{
    $g= array('Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato');
    $ts = mktime(0, 0, 0, $m, $d, $a);
    $gd = getdate($ts);
    return $g[$gd['wday']];
};
$date = strtotime($visit->date);
        $y = strtolower(date("Y",$date));
        $m = strtolower(date("m",$date));
        $d = strtolower(date("d",$date));
        $g = giornoData($d, $m, $y)
?>

<div class="row-space" style="margin-left:100px;float:left;">
<a href="{{ URL::action('VisitController@index') }}">
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
            sssss
        </h1>
    </div>
    <form action="{{ URL::action('VisitController@update', $visit) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
    <div class="row row-space justify-content-center">
        <h5>
            Comdddddddddddddddddd.<button id="confirmChange" type="submit" name="submit" class="btn btn-outline-success btn-prenota font-weight-bold col-lg-2">+</button>
        </h5>
    </div>
    
    
        
        
    <div class="row row-space justify-content-center border-form align-items-center">

    <div class="col-lg-5">
        <div class="row row-space justify-content-center">
        <div class="form-group">
            <input type="date" class="form-control" name="date" value="{{ $visit->date }}">
            <small class="form-text text-muted">Modifica la data della visita</small>
        </div>
        </div>

        <div class="row row-space justify-content-center">
        <div class="form-group">
         
          
          @if ($g == 'Sabato')
          <select name="time" id="time" class="form-control">
          @for($i = 0; $i < count($timeSabato); $i++)
            <option value="{{ $timeSabato[$i] }}">{{ $timeSabato[$i] }}</option>
            @endfor
          @else
          <select name="time" id="time" class="form-control">
          @for($i = 0; $i < count($time); $i++)
            <option value="{{ $time[$i] }}">{{ $time[$i] }}</option>
            @endfor
        @endif
            
          </select>          
          <small class="form-text text-muted">Modifica l'ora della visita</small>
        </div>
        </div>

</div>
        <div class="col-lg-5">
        <div class="row row-space justify-content-center">
        <div class="form-group">
            <input type="number" class="form-control @error('id_doctor') is-invalid @enderror" name="id_doctor" value="{{ $visit->id_doctor }}">
            <small class="form-text text-muted">Modifica l'Id del dottore</small>
            @error('id_doctor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <div class="row row-space justify-content-center">
        <div class="form-group">
            <input type="number" class="form-control @error('id_patient') is-invalid @enderror" name="id_patient" value="{{ $visit->id_patient }}">
            <small class="form-text text-muted">Modifica l'Id del paziente</small>
            @error('id_patient')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>
        </div>

    </form>    
</div>
@endsection