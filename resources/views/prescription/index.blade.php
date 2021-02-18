@extends('layouts.app')

@section('content')


<script type="application/javascript">
    function ShowFarmaco() {
        $("#contentFarmaco").toggle("slow", function() {
            // Animation complete.
        });
        document.getElementById('contentVisita').style.display = 'none';
        document.getElementById('descriptionFarmaco').name = 'description';
        document.getElementById('descriptionVisita').name = '';

    }

    function ShowVisita() {
        $("#contentVisita").toggle("slow", function() {
            // Animation complete.
        });
        document.getElementById('contentFarmaco').style.display = 'none';
        document.getElementById('descriptionVisita').name = 'description';
        document.getElementById('descriptionFarmaco').name = '';

    }

    $(document).ready(function() {
        $("#searchFarmaco").on("click", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr ").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    $(document).ready(function() {
        $("#searchVisita").on("click", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr ").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).ready(function() {
        $("#searchConfermata").on("click", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr ").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).ready(function() {
        $("#searchDaConfermare").on("click", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr ").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).ready(function() {
        $("#searchNegata").on("click", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr ").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

@if(!strcmp(Auth::user()->role, '1'))

@endif

@if(!strcmp(Auth::user()->role, '2'))

<?php

$name = Auth::user()->name;

?>

<div class="container my-5">
    <div class="row mt-5 py-5" align="center">
        <h1>
            <p color="#000" class="font-weight-bold">Benvenuto Dott. {{ $name }} </p>
        </h1>
        <h4>
            <p color="#000" class="mt-2">Visualizza le ricette dei tuoi pazienti qui nella maniera più comoda.</p>
        </h4>
        <div class="mt-3">
            <h5>
                <p color="#000" align="center">Scegli se visualizzare tutti i pazienti o fare una ricerca specifica.
                </p>
            </h5>
        </div>
    </div>

    <div class="my-3" align="center">
        <div class="row">

            <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                    <input type="radio" name="type1" id="searchFarmaco" value="farmaco">
                    <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Farmaco</h4>
                </label>
                <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                    <input type="radio" name="type1" id="searchVisita" value="visita">
                    <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Visita</h4>
                </label>


            </div>

        </div>
        <div class="row my-4 pb-5">
            <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">

                <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                    <input type="radio" name="type2" id="searchConfermata" value="confermata">
                    <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Confermata</h4>
                </label>
                <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                    <input type="radio" name="type2" id="searchDaConfermare" value="da confermare">
                    <h4 class="font-weight-bold text-nowrap" style="margin-top: 25px; margin-bottom: 25px;">Da confermare</h4>
                </label>
                <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                    <input type="radio" name="type2" id="searchNegata" value="negata">
                    <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Negata</h4>
                </label>
            </div>
        </div>
    </div>



    <div class="table-border">
        <table class="table table-borderless table-hover" style="margin:0px;">
            <thead>
                <tr class="bg-info" style="color:#fff;text-align:center">
                    <th scope="col" style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">Data</th>
                    <th scope="col">RFE</th>
                    <th scope="col">Codice Fiscale</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sesso</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col" style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prescriptions as $p)
                <?php
                    $id = $p->patient->id_user;
                    $user = DB::table('users')->where('id', $id)->select('name', 'surname')->get();
                    foreach ($user as $info) {
				        $nome = $info->name;
                        $cognome = $info->surname;
			        }                
                ?>
                <tr class="font-weight-bold text-uppercase" style="color:#626262;text-align:center;">
                    <td style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">{{ date('d/m/Y', strtotime($p->date)) }}</td>
                    <td>{{ $p->rfe }}</td>
                    <td>{{ $p->patient->fiscal_code }}</td>
                    <td>{{ $nome }}</td>
                    <td>{{ $cognome }}</td>
                    <td>{{ $p->patient->gender }}</td>
                    <td>{{ $p->type }}</td>
                    <td>{{ $p->description }}</td>
                    <td style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">{{ $p->status }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endif

@if(!strcmp(Auth::user()->role, '3'))
<div class="container my-5">
    <div class="row mt-5 py-5" align="center">
        <h1>
            <p color="#000" class="font-weight-bold">Visualizza le tue ricette</p>
        </h1>
        <h4>
            <p color="#000" class="mt-2">Visualizza tutte le tue ricette di farmaci o visite specialistiche.</p>
        </h4>
        <div>
            <div class="my-3">
                <h5>
                    <p color="#000" align="center">Seleziona il tipo e visualizza le tue ricette.
                    </p>
                </h5>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <p align="center" class="alert alert-danger" style="width: 300px; height:auto; padding:0%; margin:5px;">{{ '*' . $error  }}</p>
                @endforeach
                @endif
            </div>
            <div class="container my-5 " align="center">
                <div class="row">
                    <div class=" btn-group-toggle w-100 h-100" data-toggle="buttons">
                        <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                            <input type="radio" name="type" id="searchFarmaco" value="farmaco">
                            <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Farmaco</h4>
                        </label>
                        <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                            <input type="radio" name="type" id="searchVisita" value="visita">
                            <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Visita</h4>
                        </label>
                    </div>
                </div>
            </div>



<div class="table-border">
            <table class="table table-borderless table-hover" align="center" id="contentVisita" >
                <thead>
                    <thead>
                    <tr class="bg-info" style="color:#fff;text-align:center">
                    <th scope="col" style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">Date</th>
                            <th scope="col">RFE</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col" style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">Tipo</th>

                        </tr>
                    </thead>
                <tbody>



                    @foreach($prescriptions as $p)
                    <tr class="font-weight-bold text-uppercase" style="color:#626262;text-align:center;">
                    <td style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">{{ $p->date }}</th>
                        @if(($p->status) == 'confermata')
                        <td>{{ $p->rfe }}</td>
                        @else
                        <td>-</td>
                        @endif
                        <td>{{ $p->description }}</td>
                        <td style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">{{ $p->type }}</td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
</div>
        </div>


    </div>
</div>
@endif
@endsection