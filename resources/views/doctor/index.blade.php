@extends('layouts.app')
<!-- Parte del bottone indeitro da mettere in layout -->
@section('content')
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