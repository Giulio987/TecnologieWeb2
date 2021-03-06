@extends('layouts.app')

@section('content')

@if(!strcmp(Auth::user()->role, '3'))
<?php

$oraDisponibile = 0;

date_default_timezone_set('Europe/Rome');

$time = array('08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00');
$timeSabato = array('08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30');

function giornoData($d, $m, $a)
{
    $g = array('Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato');
    $ts = mktime(0, 0, 0, $m, $d, $a);
    $gd = getdate($ts);
    return $g[$gd['wday']];
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
                Seleziona la data e prenota l'orario per la visita dal tuo medico di base.   
            </h5>
        </div>
        <div class=" row row-space justify-content-center">
        
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
                    $d1 = date('d');
                    $m1 = date('m');
                    $y1 = date('y');
                    $date1 = date('Y/m/d');
                    $gContent1 = giornoData($d1, $m1, $y1);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
                        <input type="radio" name="date" id="Show1" value="{{ $date1 }}">
                        <h5 class="my-3">{{ $gContent1 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d1 }}</h3>
                    </label>
                    <?php
                    $datenow2 = date('Y/m/d');
                    $CalculateDate2 = strtotime('+1 day', strtotime($datenow2));
                    $date2 = date('Y/m/d', $CalculateDate2);
                    $d2 = date('d', $CalculateDate2);
                    $m2 = date('m', $CalculateDate2);
                    $y2 = date('y', $CalculateDate2);
                    $gContent2 = giornoData($d2, $m2, $y2);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2 ">
                        <input type="radio" name="date" id="Show2" value="{{ $date2 }}">
                        <h5 class="my-3">{{ $gContent2 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d2 }}</h3>
                    </label>
                    <?php
                    $datenow3 = date('Y/m/d');
                    $CalculateDate3 = strtotime('+2 day', strtotime($datenow3));
                    $date3 = date('Y/m/d', $CalculateDate3);
                    $d3 = date('d', $CalculateDate3);
                    $m3 = date('m', $CalculateDate3);
                    $y3 = date('y', $CalculateDate3);
                    $gContent3 = giornoData($d3, $m3, $y3);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
                        <input type="radio" name="date" id="Show3" value="{{ $date3 }}">
                        <h5 class="my-3">{{ $gContent3 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d3 }}</h3>
                    </label>
                    <?php
                    $datenow4 = date('Y/m/d');
                    $CalculateDate4 = strtotime('+3 day', strtotime($datenow4));
                    $date4 = date('Y/m/d', $CalculateDate4);
                    $d4 = date('d', $CalculateDate4);
                    $m4 = date('m', $CalculateDate4);
                    $y4 = date('y', $CalculateDate4);
                    $gContent4 = giornoData($d4, $m4, $y4);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
                        <input type="radio" name="date" id="Show4" value="{{ $date4 }}">
                        <h5 class="my-3">{{ $gContent4 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d4 }}</h3>
                    </label>
                    <?php
                    $datenow5 = date('Y/m/d');
                    $CalculateDate5 = strtotime('+4 day', strtotime($datenow5));
                    $date5 = date('Y/m/d', $CalculateDate5);
                    $d5 = date('d', $CalculateDate5);
                    $m5 = date('m', $CalculateDate5);
                    $y5 = date('y', $CalculateDate5);
                    $gContent5 = giornoData($d5, $m5, $y5);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
                        <input type="radio" name="date" id="Show5" value="{{ $date5 }}">
                        <h5 class="my-3">{{ $gContent5 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d5 }}</h3>
                    </label>
                    <?php
                    $datenow6 = date('Y/m/d');
                    $CalculateDate6 = strtotime('+5 day', strtotime($datenow6));
                    $date6 = date('Y/m/d', $CalculateDate6);
                    $d6 = date('d', $CalculateDate6);
                    $m6 = date('m', $CalculateDate6);
                    $y6 = date('y', $CalculateDate6);
                    $gContent6 = giornoData($d6, $m6, $y6);
                    ?>
                <label class="btn btn-outline-primary col-lg-2 quadrato mx-4 mb-2">
                    <input type="radio" name="date" id="Show6" value="{{ $date6 }}">
                    <h5 class="my-3">{{ $gContent6 }}</h5>
                    <h3 class="font-weight-bold my-3">{{ $d6 }}</h3>
                </label>
            </div>
        </div>

        <div class="row row-space justify-content-center" id="content1" style="display:none">
            @if($gContent1 != 'Domenica' && $gContent1 != 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($time); $i++)
                        @if (DB::table('visits')->where('date', $date1)->where('time',$time[$i])->doesntExist() && strtotime($time[$i]) > strtotime(date('H:i')))
                            <?php $oraDisponibile++; ?>
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $time[$i] }}
                                    <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div> 
                @if($oraDisponibile == 0)
                    @if (strtotime($time[count($time) - 1]) <= strtotime(date('H:i'))) 
                        <div class="row justify-content-center">
                            <div class="alert alert-info col-lg-6" role="alert">
                                <h5>L'ambulatorio chiude alle {{ $time[count($time) - 1] }}, prenota per domani</h5>
                            </div>
                        </div>
                    @else
                        <div class="row justify-content-center">
                            <div class="alert alert-info col-lg-6" role="alert">
                                <h5>Non ci sono orari disponibili per oggi.</h5>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
            @if ($gContent1 == 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($timeSabato); $i++) 
                        @if (DB::table('visits')->where('date', $date1)->where('time',$timeSabato[$i])->doesntExist() && strtotime($timeSabato[$i]) > strtotime(date('H:i')))
                            <?php $oraDisponibile++; ?>
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $timeSabato[$i] }}
                                    <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div>
                @if($oraDisponibile == 0)
                    @if (strtotime($timeSabato[count($timeSabato) - 1]) <= strtotime(date('H:i'))) 
                        <div class="row justify-content-center">
                            <div class="alert alert-info col-lg-6" role="alert">
                                <h5>L'ambulatorio chiude alle {{ $timeSabato[count($timeSabato) - 1] }}, prenota per domani</h5>
                            </div>
                        </div>
                    @else
                        <div class="row justify-content-center">
                            <div class="alert alert-info col-lg-6" role="alert">
                                <h5>Non ci sono orari disponibili per oggi.</h5>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
            @if ($gContent1 == 'Domenica')
                <div class="row justify-content-center">
                    <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
                    </div>
                </div>            
            @endif
        </div>

        <div class="row row-space justify-content-center" id="content2" style="display:none">
            @if($gContent2 != 'Domenica' && $gContent2 != 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($time); $i++)
                        @if (DB::table('visits')->where('date', $date2)->where('time',$time[$i])->doesntExist())
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $time[$i] }}
                                    <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div> 
                @if (count(DB::table('visits')->where('date', $date2)->get()) == count($time))
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                            <h5>Non ci sono orari disponibili per oggi.</h5>
                        </div>
                    </div>
                @endif
            @endif
            @if ($gContent2 == 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($timeSabato); $i++) 
                        @if (DB::table('visits')->where('date', $date2)->where('time',$timeSabato[$i])->doesntExist())
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $timeSabato[$i] }}
                                    <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div>
                @if (count(DB::table('visits')->where('date', $date2)->get()) == count($timeSabato))
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                            <h5>Non ci sono orari disponibili per oggi.</h5>
                        </div>
                    </div>
                @endif
            @endif
            @if ($gContent2 == 'Domenica')
                <div class="row justify-content-center">
                    <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
                    </div>
                </div>            
            @endif
        </div>

        <div class="row row-space justify-content-center" id="content3" style="display:none;">
            @if($gContent3 != 'Domenica' && $gContent3 != 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($time); $i++)
                        @if (DB::table('visits')->where('date', $date3)->where('time',$time[$i])->doesntExist())
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $time[$i] }}
                                    <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div> 
                @if (count(DB::table('visits')->where('date', $date3)->get()) == count($time))
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                            <h5>Non ci sono orari disponibili per oggi.</h5>
                        </div>
                    </div>
                @endif
            @endif
            @if ($gContent3 == 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($timeSabato); $i++) 
                        @if (DB::table('visits')->where('date', $date3)->where('time',$timeSabato[$i])->doesntExist())
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $timeSabato[$i] }}
                                    <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div>
                @if (count(DB::table('visits')->where('date', $date3)->get()) == count($timeSabato))
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                            <h5>Non ci sono orari disponibili per oggi.</h5>
                        </div>
                    </div>
                @endif
            @endif
            @if ($gContent3 == 'Domenica')
                <div class="row justify-content-center">
                    <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
                    </div>
                </div>            
            @endif
        </div>

        <div class="row row-space justify-content-center" id="content4" style="display:none">
            @if($gContent4 != 'Domenica' && $gContent4 != 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($time); $i++)
                        @if (DB::table('visits')->where('date', $date4)->where('time',$time[$i])->doesntExist())
                                <button type="submit" class="btn btn-orario btn-outline-primary font-weight-bold">{{ $time[$i] }}
                                    <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div> 
                @if (count(DB::table('visits')->where('date', $date4)->get()) == count($time))
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                            <h5>Non ci sono orari disponibili per oggi.</h5>
                        </div>
                    </div>
                @endif
            @endif
            @if ($gContent4 == 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($timeSabato); $i++) 
                        @if (DB::table('visits')->where('date', $date4)->where('time',$timeSabato[$i])->doesntExist())
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $timeSabato[$i] }}
                                    <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div>
                @if (count(DB::table('visits')->where('date', $date4)->get()) == count($timeSabato))
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                            <h5>Non ci sono orari disponibili per oggi.</h5>
                        </div>
                    </div>
                @endif
            @endif
            @if ($gContent4 == 'Domenica')
                <div class="row justify-content-center">
                    <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
                    </div>
                </div>            
            @endif
        </div>

        <div class="row row-space justify-content-center" id="content5" style="display:none">
            @if($gContent5 != 'Domenica' && $gContent5 != 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($time); $i++)
                        @if (DB::table('visits')->where('date', $date5)->where('time',$time[$i])->doesntExist())
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $time[$i] }}
                                    <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div> 
                @if (count(DB::table('visits')->where('date', $date5)->get()) == count($time))
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                            <h5>Non ci sono orari disponibili per oggi.</h5>
                        </div>
                    </div>
                @endif
            @endif
            @if ($gContent5 == 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($timeSabato); $i++) 
                        @if (DB::table('visits')->where('date', $date5)->where('time',$timeSabato[$i])->doesntExist())
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $timeSabato[$i] }}
                                    <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div>
                @if (count(DB::table('visits')->where('date', $date5)->get()) == count($timeSabato))
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                            <h5>Non ci sono orari disponibili per oggi.</h5>
                        </div>
                    </div>
                @else
                {{ count(DB::table('visits')->where('date', $date5)->get()) }}
                {{ count($timeSabato) }}
                @endif
            @endif
            @if ($gContent5 == 'Domenica')
                <div class="row justify-content-center">
                    <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
                    </div>
                </div>            
            @endif
        </div>

        <div class="row row-space justify-content-center" id="content6" style="display:none">
            @if($gContent6 != 'Domenica' && $gContent6 != 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($time); $i++)
                        @if (DB::table('visits')->where('date', $date6)->where('time',$time[$i])->doesntExist())
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $time[$i] }}
                                    <input type="radio" name="time" id="{{ $time[$i] }}" value="{{ $time[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div> 
                @if (count(DB::table('visits')->where('date', $date3)->get()) == count($time))
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                            <h5>Non ci sono orari disponibili per oggi.</h5>
                        </div>
                    </div>
                @endif
            @endif
            @if ($gContent6 == 'Sabato')
                <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                    @for($i = 0; $i < count($timeSabato); $i++) 
                        @if (DB::table('visits')->where('date', $date6)->where('time',$timeSabato[$i])->doesntExist())
                                <button type="submit" class="confirmPrenota btn btn-orario btn-outline-primary font-weight-bold">{{ $timeSabato[$i] }}
                                    <input type="radio" name="time" id="{{ $timeSabato[$i] }}" value="{{ $timeSabato[$i] }}">
                                </button>
                        @endif
                    @endfor
                </div>
                @if (count(DB::table('visits')->where('date', $date6)->get()) == count($timeSabato))
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                            <h5>Non ci sono orari disponibili per oggi.</h5>
                        </div>
                    </div>
                @endif
            @endif
            @if ($gContent6 == 'Domenica')
                <div class="row justify-content-center">
                    <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non è possibile prenotare appuntamenti per Domenica.</h5>
                    </div>
                </div>            
            @endif
        </div>

<input id="id_doctor" name="id_doctor" type="hidden" value="{{ $patient->id_doctor }}">
<input id="id_patient" name="id_patient" type="hidden" value="{{ $patient->id }}">
</form>

</div>
@endif
@endsection