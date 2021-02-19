@extends('layouts.app')

@section('content')

@if(!strcmp(Auth::user()->role, '2'))

<script type="application/javascript">
    function Show1() {
        $("#content1").toggle("slow", function() {
            // Animation complete.
        });
        document.getElementById('content2').style.display = 'none';
        document.getElementById('content3').style.display = 'none';
        document.getElementById('content4').style.display = 'none';
        document.getElementById('content5').style.display = 'none';
        document.getElementById('content6').style.display = 'none';
    }

    function Show2() {
        document.getElementById('content1').style.display = 'none';
        $("#content2").toggle("slow", function() {
            // Animation complete.
        });
        document.getElementById('content3').style.display = 'none';
        document.getElementById('content4').style.display = 'none';
        document.getElementById('content5').style.display = 'none';
        document.getElementById('content6').style.display = 'none';
    }

    function Show3() {
        document.getElementById('content1').style.display = 'none';
        document.getElementById('content2').style.display = 'none';
        $("#content3").toggle("slow", function() {
            // Animation complete.
        });
        document.getElementById('content4').style.display = 'none';
        document.getElementById('content5').style.display = 'none';
        document.getElementById('content6').style.display = 'none';
    }

    function Show4() {
        document.getElementById('content1').style.display = 'none';
        document.getElementById('content2').style.display = 'none';
        document.getElementById('content3').style.display = 'none';
        $("#content4").toggle("slow", function() {
            // Animation complete.
        });
        document.getElementById('content5').style.display = 'none';
        document.getElementById('content6').style.display = 'none';
    }

    function Show5() {
        document.getElementById('content1').style.display = 'none';
        document.getElementById('content2').style.display = 'none';
        document.getElementById('content3').style.display = 'none';
        document.getElementById('content4').style.display = 'none';
        $("#content5").toggle("slow", function() {
            // Animation complete.
        });
        document.getElementById('content6').style.display = 'none';
    }

    function Show6() {
        document.getElementById('content1').style.display = 'none';
        document.getElementById('content2').style.display = 'none';
        document.getElementById('content3').style.display = 'none';
        document.getElementById('content4').style.display = 'none';
        document.getElementById('content5').style.display = 'none';
        $("#content6").toggle("slow", function() {
            // Animation complete.
        });
    }
</script>


<?php

date_default_timezone_set('Europe/Rome');

$time = array('08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00');

function giornoData($d, $m, $a)
{
    $gShort = array('Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato');
    $ts = mktime(0, 0, 0, $m, $d, $a);
    $gd = getdate($ts);
    return $gShort[$gd['wday']];
};
?>

<div class="container my-5">
    <div class="row mt-5 py-5" align="center">
        <h1>
            <p color="#000" class="font-weight-bold">Visualizza le tue visite</p>
        </h1>
        <h4>
            <p color="#000" class="mt-2">Visualizza le ore in cui devi effetuare le tue visite.</p>
        </h4>
            <div class="container my-5 " align="center">
                <div class="row">
                <div class="btn-group-toggle btn w-100 h-100" data-toggle="buttons">
                        <?php
                        $d = date("d");
                        $m = date("m");
                        $y = date("y");
                        $date1 = date('Y/m/d');
                        $gContent1 = giornoData($d, $m, $y);
                        ?>
                        <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
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
                        <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2 ">
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
                        <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
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
                        <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
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
                        <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
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
                        <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
                            <input type="radio" name="date" id="date6" value="{{ $date6 }}" onclick="Show6()">
                            <h5 class="my-3">{{ $gContent6 }}</h5>
                            <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row my-5" id="content1" style="display:none">
                @if($gContent1 != 'Domenica')
                <div class="  w-100 h-100"  style="text-align: center;">
                    @for($i = 0; $i < count($time); $i++)
                    @if (DB::table('visits')->where('date', $date1)->where('time',$time[$i])->exists())
                    <label class=" btn-color  font-weight-bold col-md">{{ $time[$i] }}
                    </label>
                    @endif
                    @endfor
                </div>
                @else
                <div align="center">
                    <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
                    Giornata libera.
                    </div>
                </div>
                @endif
            </div>
            <div class="row my-5" id="content2" style="display:none">
                @if($gContent2 != 'Domenica')
                <div class="  w-100 h-100"  style="text-align: center;">
                    @for($i = 0; $i < count($time); $i++)
                    @if (DB::table('visits')->where('date', $date2)->where('time',$time[$i])->exists())
                    <label class=" btn-color  font-weight-bold col-md">{{ $time[$i] }}
                    </label>
                    @endif
                    @endfor
                </div>
                @else
                <div align="center">
                    <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
                    Giornata libera.
                    </div>
                </div>
                @endif
            </div>

            <div class="row my-5" id="content3" style="display:none">
                @if($gContent3 != 'Domenica')
                <div class="w-100 h-100"  style="text-align: center;">
                    @for($i = 0; $i < count($time); $i++)
                    @if (DB::table('visits')->where('date', $date3)->where('time',$time[$i])->exists())
                    <button class="btn btn-orario btn-outline-primary font-weight-bold col-md" href="">{{ $time[$i] }}
                    </button>
                    @endif
                    @endfor
                </div>
                @else
                <div align="center">
                    <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
                    Giornata libera.
                    </div>
                </div>
                @endif
            </div>
            <div class="row my-5" id="content4" style="display:none">
                @if($gContent4 != 'Domenica')
                <div class="  w-100 h-100"  style="text-align: center;">
                    @for($i = 0; $i < count($time); $i++)
                    @if (DB::table('visits')->where('date', $date4)->where('time',$time[$i])->exists())
                    <label class=" btn-color  font-weight-bold col-md">{{ $time[$i] }}
                    </label>
                    @endif
                    @endfor
                </div>
                @else
                <div align="center">
                    <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
                    Giornata libera.
                    </div>
                </div>
                @endif
            </div>
            <div class="row my-5" id="content5" style="display:none">
                @if($gContent5 != 'Domenica')
                <div class="  w-100 h-100"  style="text-align: center;">
                    @for($i = 0; $i < count($time); $i++)
                    @if (DB::table('visits')->where('date', $date5)->where('time',$time[$i])->exists())
                    <label class=" btn-color  font-weight-bold col-md">{{ $time[$i] }}
                    </label>
                    @endif
                    @endfor
                </div>
                @else
                <div align="center">
                    <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
                    Giornata libera.
                    </div>
                </div>
                @endif
            </div>
            <div class="row my-5" id="content6" style="display:none">
                @if($gContent6 != 'Domenica')
                <div class="  w-100 h-100"  style="text-align: center;">
                    @for($i = 0; $i < count($time); $i++)
                    @if (DB::table('visits')->where('date', $date6)->where('time',$time[$i])->exists())
                    <label class=" btn-color  font-weight-bold col-md">{{ $time[$i] }}
                    </label>
                    @endif
                    @endfor
                </div>
                @else
                <div align="center">
                    <div class="alert alert-info" role="alert" style="width: 500px; height:auto;">
                        Giornata libera.
                    </div>
                </div>
                @endif
            </div> 
    </div>
</div>

@endif

@if(!strcmp(Auth::user()->role, '3'))

<script type="application/javascript">
    function Show() {
        $("#content").show("slow", function() {
            // Animation complete.
        });
    }
    $(document).ready(function() {
        $("#visitaPassata").on("click", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr ").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $("#visitaFutura").on("click", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr ").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<?php
$id = Auth::user()->id;
$info = DB::table('patients')->where('id_user', $id)->select('id')->get();
foreach ($info as $patient) {
    $res2 = $patient->id;
} 
$visits = DB::table('visits')->where('id_patient', $res2)->get();
?>

<div class="container my-5">
    <div class="row mt-5 py-5" align="center">
        <h1>
            <p color="#000" class="font-weight-bold">Benvenuto </p>
        </h1>
        <h4>
            <p color="#000" class="mt-2">Visualizza le visite in programma</p>
        </h4>
        <div class="mt-3">
            <h5>
                <p color="#000" align="center">Visualizza i tuoi appuntamenti in programma o passati
                </p>
            </h5>
        </div>
    </div>

    <div class="my-3" align="center">
        <div class="row">

            <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                    <input type="radio" name="type1" id="visitaPassata" value="visita1">
                    <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Visite Passate</h4>
                </label>
                <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                    <input type="radio" name="type1" id="visitaFutura" value="visita2">
                    <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Visita da effettuare</h4>
                </label>


            </div>

        </div>
    </div>



    <div class="table-border">
        <table class="table table-borderless table-hover" style="margin:0px;">
            <thead>
                <tr class="bg-info" style="color:#fff;text-align:center">
                    <th scope="col" style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">Data</th>
                    <th scope="col" style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">Ora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visits as $v)
               <?php
                    if($v->time > date()){
                        $id = "visitafutura";
                    }else{
                        $id = "visitapassata";
                    }
               ?>
                <tr class="font-weight-bold text-uppercase" id="{{ $id }}" style="color:#626262;text-align:center;">
                    <td style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">{{ date('Y-m-d H:i:s')}};</td>
                    <td style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">{{ $v->time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection