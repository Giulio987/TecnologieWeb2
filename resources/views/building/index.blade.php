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

        <div class="row row-space justify-content-center border-form align-items-center py-5">
            <div class="col-lg-2">
                    <input type="text" class="form-control" name="street_address" id="street_address" placeholder="Via/Viale/Piazza">
            </div>
            <div class="col-lg-2">
                    <input type="text" class="form-control" name="street_number" id="street_number" placeholder="N°">
            </div>
            <div class="col-lg-2">
                    <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="CAP">
            </div>
            <div class="col-lg-2">
                    <input type="text" class="form-control" name="city" id="city" placeholder="Città">
            </div>
            <div class="col-lg-2">

                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <a href="" id="add-building-btn" style="float:right">
                <button class="btn btn-outline-success">Aggiungi<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle pl-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </button>
                </a>
            </div>
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

<script type="text/javascript">
    $('document').ready(function() {
        $('#add-building-btn').bind('click', function(e) {
            e.preventDefault();
            var street_address = $('#street_address').val();
            var street_number = $('#street_number').val();
            var postal_code = $('#postal_code').val();
            var city = $('#city').val();
            var _token = $('#_token').val();
            console.log(street_address);
            console.log(street_number);
            console.log(postal_code);
            console.log(city);
            if (street_address.length > 0 ) {
                $.ajax({
                    url: "/building",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'street_address': street_address,
                        'street_number': street_number,
                        'postal_code': postal_code,
                        'city': city,
                        '_token': _token
                    },
                    success: function(data) {
                        if (data.status === 'ok') {
                            var newColId = $('<td/>', {
                                text: data.building.id
                            });
                            var newColStreetName = $('<td/>', {
                                text: data.building.street_address
                            });
                            var newColStreetNum = $('<td/>', {
                                text: data.building.street_number
                            });
                            var newColCap = $('<td/>', {
                                text: data.building.postal_code
                            });
                            var newColCity = $('<td/>', {
                                text: data.building.city
                            });
                            var delAction = $('<a/>', {
                                href: '#',
                                text: 'Elimina',
                                class: "btn btn-outline-danger btn-sm delete-btn",
                                "id": data.building.id
                            });
                            var newColAction = $('<td/>').append(delAction);
                            var newRow = $('<tr/>').append(newColId).append(
                                newColStreetName).append(newColStreetNum).append(
                                newColCity).append(newColCap).append(newColAction).addClass("font-weight-bold text-uppercase");;
                            $('#buildings-table').append(newRow);
                        }
                    },
                    error: function(response, stato) {
                        console.log(response);
                        console.log(stato);
                    }
                });
            }
        });
        $('.delete-btn').bind('click', function(e) {
            e.preventDefault();
            if (confirm("Vuoi davvero eliminare?") == true) {
                alert("Eliminazione avvenuta!");
            
                // Nota, qui $(this) è l'elemento <a> ovvero il bottone.
                var row = $(this).parents('tr');            // Ottengo  la riga della tabella cercando fa i parents del bottone l'elemento <tr>
                var buildingId = $(this).attr('data-id');     // Ottengo l'id dell'edificio andando a prelevare il valore dell'attributo "id"
                var _token = $('#_token').val();            // Ottengo il token del form perchè mi serve anche per l'azione che sto per compiere 
                $.ajax({
                        url: "/building/" + buildingId,     // Visto che posso configurarla usa l'azione di default per la Destroy 
                        type: "DELETE",                     // Uso appunto il metodo DELETE
                        dataType: "json",  
                        data: { 'building': buildingId, '_token': _token }, // Passo l'id della categria e il token 
                        success: function(data) {                        
                            if (data.status === 'ok') {
                                $(row).remove();            // Qui ho usato un semplice remove() ma potrei usare un fadeOut() o altro 
                            }
                        }, 
                        error: function(response, stato) {
                            console.log(response);
                        }
                    });
                }else {
                alert("Hai annullato");
                return false;
            }
        });
    });
</script>
@endsection