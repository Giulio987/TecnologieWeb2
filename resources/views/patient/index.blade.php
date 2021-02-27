@extends('layouts.app')

@section('content')
<?php
$name = Auth::user()->name;
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
<div class="row-space justify-content-center" style="margin-right:100px;float:right;">
<a href="{{ URL::action('PatientController@create') }}">
<button class="btn btn-outline-primary"><span class="text-uppercase">registra paziente</span>
<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-right-circle pl-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg>
</button>
</a>
        
        </div>
<div class="container-lg" align="center">
    <div class="row row-space justify-content-center">
        <h1 class="font-weight-bold">
            @if(!strcmp(Auth::user()->role, '1'))
            Amministratore, visualizza tutti i pazienti.
            @elseif(!strcmp(Auth::user()->role, '2'))
            Ciao Dott. {{ $name }}, visualizza i tuoi pazienti.
            @endif
        </h1>
    </div>
    <div class="row row-space justify-content-center">
        <h4 class="mb-3">
            Visualizza qui tutti i pazienti quando ti è più comodo.
        </h4>
    </div>
    <div class="row row-space justify-content-center">
        <h5>
            Ricerca per qualsiasi attributo e visualizza le informazioni del paziente.

        </h5>
    </div>

    <div class="row row-space justify-content-center align-items-center">
            <input class="quadrato-ricetta col-lg-4 text-uppercase button-search" id="search" type="text" placeholder="ricerca"  style="padding:1em;">
    </div>

        <div class="row row-space justify-content-center">

                 


<div class="table-responsive" style="white-space: nowrap;">
                <table class="table table-borderless table-hover table-border">
                    <thead>
                        <tr class="bg-info" style="color:#fff;">
                            <th scope="col-lg" style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">Codice Fiscale</th>
                            <th scope="col-lg">Nome</th>
                            <th scope="col-lg">Cognome</th>
                            <th scope="col-lg" style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 0px 20px 20px 0px;">Informazioni</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                    @foreach($patients as $p)  
                <?php
                    $id = $p->id_user;
                    $user = DB::table('users')->where('id', $id)->select('name', 'surname', 'email')->get();
                    foreach ($user as $info) {
				        $nome = $info->name;
                        $cognome = $info->surname;
                        $email = $info->email;
			        }  
                    ?> 
                            <tr class="font-weight-bold text-uppercase" style="color:#626262;">
                                <td style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">{{ $p->fiscal_code }}</td>
                                <td>{{ $nome}}</td>
                                <td>{{ $cognome }}</td>
                                <td style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 0px 20px 20px 0px;"><button type="button" class="btn btn-outline-primary" data-whatever1="{{ $p->fiscal_code }}" data-whatever2="{{ $nome }}" data-whatever3="{{ $cognome }}" data-whatever4="{{ $email }}" data-whatever5="{{ $p->dob }}" data-whatever6="{{ $p->gender }}" data-whatever7="{{ $p->phone_number }}" data-whatever8="{{ $p->street_address }}" data-whatever9="{{ $p->street_number }}" data-whatever10="{{ $p->city }}" data-whatever11="{{ $p->postal_code }}" data-toggle="modal" data-target="#exampleModal3">Visualizza descrizione</button></td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informazioni</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="FiscalCode"></p>
                            <p id="Name"></p>
                            <p id="Surname"></p>
                            <p id="Email"></p>
                            <p id="Dob"></p>
                            <p id="Gender"></p>
                            <p id="PhoneNumber"></p>
                            <p id="StreetAddress"></p>
                            <p id="StreetNumber"></p>
                            <p id="City"></p>
                            <p id="PostalCode"></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection