@extends('layouts.app')

@section('content')

<?php
    $name = Auth::user()->name;
?>

@if(!strcmp(Auth::user()->role, '2') || !strcmp(Auth::user()->role, '1'))
<!-- container Dottore -->
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
            @if (!strcmp(Auth::user()->role, '1'))
                Benvenuto Amministratore! Visualizza le ricette di tutti i pazienti da convalidare o negare.
            @else
                Ciao Dott. {{ $name }}, visualizza le ricette dei tuoi pazienti da convalidare o negare.
            @endif
        </h1>
    </div>
    <div class="row row-space justify-content-center">
        <h4>
            Visualizza tutte le tue ricette relative ai farmaci o visite specialistiche.
        </h4>
    </div>
    <div class="row row-space justify-content-center">
        <h5>
            Seleziona il tipo, lo stato e visualizza le ricette.
        </h5>
    </div>
    <div class="row row-space justify-content-center">
            <input class="quadrato-ricetta col-lg-4 text-uppercase button-search" id="myInput" type="text" placeholder="ricerca" style="padding:1em;">
    </div>
    <div class="row row-space justify-content-center">
        <div class="table-responsive" style="white-space: nowrap;">
            <table class="table table-borderless table-hover table-border">
                <thead>
                    <tr class="bg-info" style="color:#fff;">
                        <th scope="col-lg" style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">Data</th>
                        <th scope="col-lg">RFE</th>
                        <th scope="col-lg">Codice Fiscale</th>
                        <th scope="col-lg">Cognome</th>
                        <th scope="col-lg">Nome</th>
                        <th scope="col-lg">Sesso</th>
                        <th scope="col-lg">Tipo</th>
                        <th scope="col-lg">Descrizione</th>
                        <th scope="col-lg" style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">Azione</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach($prescriptions as $p)
                    <?php $id = $p->patient->id_user;
                    $user = DB::table('users')->where('id', $id)->select('name', 'surname')->get();
                    foreach ($user as $info) {
                        $nome = $info->name;
                        $cognome = $info->surname;
                    } ?>
                    <tr class="font-weight-bold text-uppercase" style="color:#626262;">
                        <td style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">{{ date('d/m/Y', strtotime($p->date)) }}</td>
                        <td>Non esistente</td>
                        <td>{{ $p->patient->fiscal_code }}</td>
                        <td>{{ $nome }}</td>
                        <td>{{ $cognome }}</td>
                        <td>{{ $p->patient->gender }}</td>
                        <td >{{ $p->type }}</td>
                        <td><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" data-whatever1="{{ $p->description }}" data-whatever2="{{ 'RFE non visualizzabile' }}" data-whatever3="{{ date('d/m/Y', strtotime($p->date)) }}">Visualizza descrizione</button></td>
                        <td style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">
                        <form action="{{ URL::action('PrescriptionController@update', $p) }}" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{ $p->id }}">
                            <input type="hidden" name="description" value="{{ $p->description }}">
                            <input type="hidden" name="id_doctor" value="{{ $p->id_doctor }}">
                            <input type="hidden" name="id_patient" value="{{ $p->id_patient }}">
                            <input type="hidden" name="date" value="{{ $p->date }}">
                            <input type="hidden" name="type" value="{{ $p->type }}">

                            <button class="btn btn-outline-success" type="submit" name="status" value="convalidata">Convalida</button>
                            <button class="btn btn-outline-danger" type="submit" name="status" value="invalidata">Invalida</button>

                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-uppercase" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 id="description" style="word-wrap: break-word;width:auto;" class="text-uppercase"></h6>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endif
@endsection