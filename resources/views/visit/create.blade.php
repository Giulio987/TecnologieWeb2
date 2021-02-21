@extends('layouts.app')

@section('content')



@if(!strcmp(Auth::user()->role, '1'))

@endif

@if(!strcmp(Auth::user()->role, '2'))

@endif
@if(!strcmp(Auth::user()->role, '3'))
<?php

$name = Auth::user()->name;

date_default_timezone_set('Europe/Rome');

$time = array('08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00');
$timeSabato = array('08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30');

function giornoData($d, $m, $a)
{
    $gShort = array('Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato');
    $ts = mktime(0, 0, 0, $m, $d, $a);
    $gd = getdate($ts);
    return $gShort[$gd['wday']];
};
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
            Ciao {{ $name }}, prenota la visita con il tuo medico di base.
        </h1>
    </div>
    <div class="row row-space justify-content-center">
        <h4>
            Fissa un appuntamento per farti ricevere dal medico quando ti è più comodo. </h4>
    </div>
    <form action="{{ URL::action('VisitController@store') }}" method="POST">
        {{ csrf_field() }}
        <div class=" row row-space justify-content-center">
            <h5>
                Seleziona data, ora e prenota la visita dal tuo medico di base.<button type="submit" name="submit" class="btn btn-outline-success btn-prenota font-weight-bold col-lg-2">+</button>
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
            <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                <?php
                $d = date("d");
                $m = date("m");
                $y = date("y");
                $date1 = date('Y/m/d');
                $gContent1 = giornoData($d, $m, $y);
                ?>
                <label class="btn btn-outline-primary col-lg-2 quadrato mx-4 mb-2">
                    <input type="radio" name="date" id="date1" value="{{ $date1 }}" onclick="Show1()">
                    <h5 class="my-3">{{ $gContent1 }}</h5>
                    <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                </label>
                <?php
                $date = date('Y/m/d');
                $CalculateDate = strtotime('+1 day', strtotime($date));
                $date2 = date("Y/m/d", $CalculateDate);
                $d = date("d", $CalculateDate);
                $m = date("m", $CalculateDate);
                $y = date("y", $CalculateDate);
                $gContent2 = giornoData($d, $m, $y);
                ?>
                <label class="btn btn-outline-primary col-lg-2 quadrato mx-4 mb-2">
                    <input type="radio" name="date" id="date2" value="{{ $date2 }}" onclick="Show2()">
                    <h5 class="my-3">{{ $gContent2 }}</h5>
                    <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                </label>
                <?php
                $date = date('Y/m/d');
                $CalculateDate = strtotime('+2 day', strtotime($date));
                $date3 = date("Y/m/d", $CalculateDate);
                $d = date("d", $CalculateDate);
                $m = date("m", $CalculateDate);
                $y = date("y", $CalculateDate);
                $gContent3 = giornoData($d, $m, $y);
                ?>
                <label class="btn btn-outline-primary col-lg-2 quadrato mx-4 mb-2">
                    <input type="radio" name="date" id="date3" value="{{ $date3 }}" onclick="Show3()">
                    <h5 class="my-3">{{ $gContent3 }}</h5>
                    <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                </label>
                <?php
                $date = date('Y/m/d');
                $CalculateDate = strtotime('+3 day', strtotime($date));
                $date4 = date("Y/m/d", $CalculateDate);
                $d = date("d", $CalculateDate);
                $m = date("m", $CalculateDate);
                $y = date("y", $CalculateDate);
                $gContent4 = giornoData($d, $m, $y);
                ?>
                <label class="btn btn-outline-primary col-lg-2 quadrato mx-4 mb-2">
                    <input type="radio" name="date" id="date4" value="{{ $date4 }}" onclick="Show4()">
                    <h5 class="my-3">{{ $gContent4 }}</h5>
                    <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                </label>
                <?php
                $date = date('Y/m/d');
                $CalculateDate = strtotime('+4 day', strtotime($date));
                $date5 = date("Y/m/d", $CalculateDate);
                $d = date("d", $CalculateDate);
                $m = date("m", $CalculateDate);
                $y = date("y", $CalculateDate);
                $gContent5 = giornoData($d, $m, $y);
                ?>
                <label class="btn btn-outline-primary col-lg-2 quadrato mx-4 mb-2">
                    <input type="radio" name="date" id="date5" value="{{ $date5 }}" onclick="Show5()">
                    <h5 class="my-3">{{ $gContent5 }}</h5>
                    <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                </label>
                <?php
                $date = date('Y/m/d');
                $CalculateDate = strtotime('+5 day', strtotime($date));
                $date6 = date("Y/m/d", $CalculateDate);
                $d = date("d", $CalculateDate);
                $m = date("m", $CalculateDate);
                $y = date("y", $CalculateDate);
                $gContent6 = giornoData($d, $m, $y);
                ?>
                <label class="btn btn-outline-primary col-lg-2 quadrato mx-4 mb-2">
                    <input type="radio" name="date" id="date6" value="{{ $date6 }}" onclick="Show6()">
                    <h5 class="my-3">{{ $gContent6 }}</h5>
                    <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                </label>
            </div>
        </div>
        <div class="row row-space justify-content-center" id="content1" style="display:none">
            @if($gContent1 != 'Domenica' && $gContent1 != 'Sabato')
            <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                @for($i = 0; $i < count($time); $i++) @if (DB::table('visits')->where('date', $date1)->where('time',$time[$i])->doesntExist())
                    @if (strtotime($time[$i]) > strtotime(date('H:i')))
                    <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $time[$i] }}
                        <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
                    </label>
            </div>
            @endif
            @endif
            @endfor
            @if (strtotime($time[count($time) - 1]) <= strtotime(date('H:i'))) <div class="row justify-content-center">
                <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
                    <h5>L'ambulatorio chiude alle 19:00, prenota per domani</h5>
                </div>
                @endif
        </div>
        @elseif ($gContent1 == 'Sabato')
        <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
            @for($i = 0; $i < count($timeSabato); $i++) @if (DB::table('visits')->where('date', $date1)->where('time',$timeSabato[$i])->doesntExist())
                @if (strtotime($timeSabato[$i]) > strtotime(date('H:i')))
                <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $timeSabato[$i] }}
                    <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
                </label>
                @endif
                @endif
                @endfor
                @if (strtotime($timeSabato[count($timeSabato) - 1]) < strtotime(date('H:i'))) <div class="row justify-content-center">
                    <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
                        <h5>L'ambulatorio chiude alle 12:30, prenota per Lunedì</h5>
                    </div>
                    @endif
        </div>
</div>

@else
<div class="row justify-content-center">
    <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
        <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
    </div>
</div>
@endif
@if (count(DB::table('visits')->where('date', $date1)->get()) == count($time) && $gContent1 != 'Domenica' && $gContent1 != 'Sabato')
<div class="row justify-content-center">
    <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
        <h5>Non ci sono orari disponibili per oggi.</h5>
    </div>
</div>
@endif
@if (count(DB::table('visits')->where('date', $date1)->get()) == count($timeSabato) && $gContent1 == 'Sabato')
<div class="row justify-content-center">
    <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
        <h5>Non ci sono orari disponibili per oggi.</h5>
    </div>
</div>
@endif
</div>
<div class="row row-space justify-content-center" id="content2" style="display:none">
    @if($gContent2 != 'Domenica' && $gContent2 != 'Sabato')
    <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
        @for($i = 0; $i < count($time); $i++) @if (DB::table('visits')->where('date', $date2)->where('time',$time[$i])->doesntExist())
            <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $time[$i] }}
                <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
            </label>
            @endif
            @endfor
    </div>
    @elseif ($gContent2 == 'Sabato')
    <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
        @for($i = 0; $i < count($timeSabato); $i++) @if (DB::table('visits')->where('date', $date2)->where('time',$timeSabato[$i])->doesntExist())
            <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $timeSabato[$i] }}
                <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
            </label>
            @endif
            @endfor
    </div>
    @else
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
        </div>
    </div>
    @endif
    @if (count(DB::table('visits')->where('date', $date2)->get()) == count($time) && $gContent2 != 'Domenica' && $gContent2 != 'Sabato')
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non ci sono orari disponibili per oggi.</h5>
        </div>
    </div>
    @endif
    @if (count(DB::table('visits')->where('date', $date2)->get()) == count($timeSabato) && $gContent2 == 'Sabato')
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non ci sono orari disponibili per oggi.</h5>
        </div>
    </div>
    @endif
</div>
<div class="row row-space justify-content-center" id="content3" style="display:none">
    @if($gContent3 != 'Domenica' && $gContent3 != 'Sabato')
    <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
        @for($i = 0; $i < count($time); $i++) @if (DB::table('visits')->where('date', $date3)->where('time',$time[$i])->doesntExist())
            <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $time[$i] }}
                <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
            </label>
            @endif
            @endfor
    </div>


    @elseif ($gContent3 == 'Sabato')
    <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
        @for($i = 0; $i < count($timeSabato); $i++) @if (DB::table('visits')->where('date', $date3)->where('time',$timeSabato[$i])->doesntExist())
            <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $timeSabato[$i] }}
                <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
            </label>
            @endif
            @endfor
    </div>
    @else
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
        </div>
    </div>
    @endif
    @if (count(DB::table('visits')->where('date', $date3)->get()) == count($time) && $gContent3 != 'Domenica' && $gContent3 != 'Sabato')
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non ci sono orari disponibili per oggi.</h5>
        </div>
    </div>
    @endif
    @if (count(DB::table('visits')->where('date', $date3)->get()) == count($timeSabato) && $gContent3 == 'Sabato')
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non ci sono orari disponibili per oggi.</h5>
        </div>
    </div>
    @endif
</div>
<div class="row row-space justify-content-center" id="content4" style="display:none">
    @if($gContent4 != 'Domenica' && $gContent4 != 'Sabato')
    <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
        @for($i = 0; $i < count($time); $i++) @if (DB::table('visits')->where('date', $date4)->where('time',$time[$i])->doesntExist())
            <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $time[$i] }}
                <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
            </label>
            @endif
            @endfor
    </div>
    @elseif ($gContent4 == 'Sabato')
    <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
        @for($i = 0; $i < count($timeSabato); $i++) @if (DB::table('visits')->where('date', $date4)->where('time',$timeSabato[$i])->doesntExist())
            <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $timeSabato[$i] }}
                <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
            </label>
            @endif
            @endfor
    </div>
    @else
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
        </div>
    </div>
    @endif
    @if (count(DB::table('visits')->where('date', $date4)->get()) == count($time) && $gContent4 != 'Domenica' && $gContent4 != 'Sabato')
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non ci sono orari disponibili per oggi.</h5>
        </div>
    </div>
    @endif
    @if (count(DB::table('visits')->where('date', $date4)->get()) == count($timeSabato) && $gContent4 == 'Sabato')
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non ci sono orari disponibili per oggi.</h5>
        </div>
    </div>
    @endif
</div>
<div class="row row-space justify-content-center" id="content5" style="display:none">
    @if($gContent5 != 'Domenica' && $gContent5 != 'Sabato')
    <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
        @for($i = 0; $i < count($time); $i++) @if (DB::table('visits')->where('date', $date5)->where('time',$time[$i])->doesntExist())
            <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $time[$i] }}
                <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
            </label>
            @endif
            @endfor
    </div>
    @elseif ($gContent5 == 'Sabato')
    <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
        @for($i = 0; $i < count($timeSabato); $i++) @if (DB::table('visits')->where('date', $date5)->where('time',$timeSabato[$i])->doesntExist())
            <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $timeSabato[$i] }}
                <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
            </label>
            @endif
            @endfor
    </div>
    @else
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
        </div>
    </div>
    @endif
    @if (count(DB::table('visits')->where('date', $date5)->get()) == count($time) && $gContent5 != 'Domenica' && $gContent5 != 'Sabato')
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non ci sono orari disponibili per oggi.</h5>
        </div>
    </div>
    @endif
    @if (count(DB::table('visits')->where('date', $date5)->get()) == count($timeSabato) && $gContent5 == 'Sabato')
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non ci sono orari disponibili per oggi.</h5>
        </div>
    </div>
    @endif
</div>
<div class="row row-space justify-content-center" id="content6" style="display:none">
    @if($gContent6 != 'Domenica' && $gContent6 != 'Sabato')
    <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
        @for($i = 0; $i < count($time); $i++) @if (DB::table('visits')->where('date', $date6)->where('time',$time[$i])->doesntExist())
            <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $time[$i] }}
                <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
            </label>
            @endif
            @endfor
    </div>
    @elseif ($gContent6 == 'Sabato')
    <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
        @for($i = 0; $i < count($timeSabato); $i++) @if (DB::table('visits')->where('date', $date6)->where('time',$timeSabato[$i])->doesntExist())
            <label class="btn btn-orario btn-outline-primary font-weight-bold col-md">{{ $timeSabato[$i] }}
                <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
            </label>
            @endif
            @endfor
    </div>
    @else
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
        </div>
    </div>
    @endif
    @if (count(DB::table('visits')->where('date', $date6)->get()) == count($time) && $gContent6 != 'Domenica' && $gContent6 != 'Sabato')
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non ci sono orari disponibili per oggi.</h5>
        </div>
    </div>
    @endif
    @if (count(DB::table('visits')->where('date', $date6)->get()) == count($timeSabato) && $gContent6 == 'Sabato')
    <div class="row justify-content-center">
        <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
            <h5>Non ci sono orari disponibili per oggi.</h5>
        </div>
    </div>
    @endif
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
</div>
</form>
</div>
@endif
@endsection