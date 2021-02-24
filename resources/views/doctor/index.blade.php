@extends('layouts.app')
<!-- Parte del bottone indeitro da mettere in layout -->
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
            Opera in totale libertà
        </h4>
    </div>
    <div class="row row-space justify-content-center">
        <h5>
            Ricerca per qualsiasi attributo e visualizza le informazioni di ogni medico.
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
                            <th scope="col-lg" style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">Codice Fiscale</th>
                            <th scope="col">Cognome</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sesso</th>
                            <th scope="col">Data di nascita</th>
                            <th scope="col">Numero di Telefono</th>
                            <th scope="col-lg" colspan="2" style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">Azioni</th>
                        </tr>
                        </thead>
                    <tbody id="myTable">

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
                        <tr class="font-weight-bold text-uppercase" style="color:#626262;">
                            <td style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">{{ $d->fiscal_code }}</td>
                            <td>{{ $cognome }}</td>
                            <td>{{ $nome }}</td>
                            <td>{{ $d->gender }}</td>
                            <td>{{ date('d/m/Y', strtotime($d->dob)) }}</td>
                            <td>{{ $d->phone_number }}</td>
                            <td><a href="{{ URL::action('DoctorController@edit', $d) }}" class="btn btn-outline-dark btn-sm">Modifica</a></td>
                            <td style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;"><a href="{{ URL::action('DoctorController@destroy', $d) }}" class="btn btn-outline-danger btn-sm">Elimina</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ URL::action('DoctorController@create') }}" class="btn quadrato-ricetta col-lg-4 text-uppercase">Registra un nuovo dottore</a>
        </div>
@endsection