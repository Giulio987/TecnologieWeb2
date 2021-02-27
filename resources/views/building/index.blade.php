<!-- Serve solo per far vedere all'amministratore tutte gli edifici -->
@extends('layouts.app')

@section('content')
    <?php $name = Auth::user()->name; ?>
    <div class="row-space" style="margin-left:100px;float:left;">
        <a href="{{ URL::action('HomeController@index') }}">
            <button style="background-color: #f8fafc;border-width: 0px;" href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                    class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </button>
        </a>
    </div>
    <div class="row-space justify-content-center" style="margin-right:100px;float:right;">
<a href="{{ URL::action('BuildingController@create') }}">
<button class="btn btn-outline-primary"><span class="text-uppercase">registra edificio</span>
<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-right-circle pl-1" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg>
</button>
</a>
        
        </div>
    <!-- Se sono admin o medici entrano qua -->
    <div class="container-lg" align="center">
        <div class="row row-space justify-content-center">
            <h1 class="font-weight-bold">
                Benvenuto Amministratore! Visualizza Gli edifici dei dottori.
            </h1>
        </div>
        <div class="row row-space justify-content-center">
            <h4>
                Visualizza tutti gli edifici e modifica le informazioni a tuo piacere
            </h4>
        </div>
        <div class="row row-space justify-content-center">
            <h4>
                Aggsisasdadasdasda
            </h4>
        </div>
        
        <div class="row row-space justify-content-center">
            <input class="quadrato-ricetta col-lg-4 text-uppercase button-search" id="myInput" type="text"
                placeholder="ricerca" style="padding:1em;">
        </div>
        <div class="row row-space justify-content-center">
            <div class="table-responsive" style="white-space: nowrap;">
                <table class="table table-borderless table-hover table-border" id="buildings-table">
                    <thead>
                        <tr class="bg-info" style="color:#fff;">
                            <th scope="col-lg"
                                style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">
                                Data</th>
                            <th scope="col-lg">Via</th>
                            <th scope="col-lg">Numero Civico</th>
                            <th scope="col-lg">CAP</th>
                            <th scope="col-lg">Città</th>
                            <th scope="col-lg" style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 0px 20px 20px 0px;">Elimina</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($buildings as $b)
                            <tr class="font-weight-bold text-uppercase" style="color:#626262;">
                                <td style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">{{ $b->id }}</td>
                                <td>{{ $b->street_address }}</td>
                                <td>{{ $b->street_number }}</td>
                                <td>{{ $b->postal_code }}</td>
                                <td>{{ $b->city }}</td>
                                <td style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 0px 20px 20px 0px;"><a href="" class="btn btn-outline-danger btn-sm delete-btn" data-id="{{ $b->id }}">Elimina</a></td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection