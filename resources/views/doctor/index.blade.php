@extends('layouts.app')

@section('content')
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
            Benvenuto Amministratore!
        </h1>
    </div>
    <div class="row row-space justify-content-center">
        <h4>
            Opera in totale libe
        </h4>
    </div>
    <div class="row row-space justify-content-center">
        <h5>
            Ricerca per qualsiasi attributo e visualizza le informazioni del tuo paziente.
        </h5>
    </div>

    <div class="row row-space justify-content-center">
            <input class="quadrato-ricetta col-lg-4 text-uppercase button-search" id="search" type="text" placeholder="ricerca"  style="padding:1em;">
    </div>

        <div class="row row-space justify-content-center" >
        <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">

                @foreach($doctors as $d)  
                <?php
                    $id = $d->id_user;
                    $user = DB::table('users')->where('id', $id)->select('name', 'surname', 'email')->get();
                    foreach ($user as $info) {
				        $nome = $info->name;
                        $cognome = $info->surname;
                        $email = $info->email;
			        }  
                    ?>  
                    <label id="searchPatient" class="col-lg-2 btn quadrato-list font-weight-bold" data-whatever1="{{ $d->fiscal_code }}" data-whatever2="{{ $nome }}" data-whatever3="{{ $cognome }}" data-whatever4="{{ $email }}" data-whatever5="{{ $d->dob }}" data-whatever6="{{ $d->gender }}" data-whatever7="{{ $d->phone_number }}" data-whatever8="{{ $d->street_address }}" data-whatever9="{{ $d->street_number }}" data-whatever10="{{ $d->city }}" data-whatever11="{{ $d->postal_code }}" data-toggle="modal" data-target="#exampleModal3" type="button" onmouseover="this.style.background='#3490dc';this.style.color='#fff';" onmouseout="this.style.background='#fff';this.style.color='#000';">
                    <p>{{ $d->fiscal_code }} {{ $nome }} {{ $cognome }}</p></label>
                    @endforeach
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