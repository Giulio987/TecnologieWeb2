@extends('layouts.app')

@section('content')

<?php
$name = Auth::user()->name;
?>
<script type="application/javascript">
    function Show() {
        $("#content").show("slow", function() {
            // Animation complete.
        });
    }
    $(document).ready(function() {
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("table tr button").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipientFiscalCode = button.data('whatever1')
            var recipientName = button.data('whatever2')
            var recipientSurname = button.data('whatever3')
            var recipientEmail = button.data('whatever4')
            var recipientDob = button.data('whatever5')
            var recipientGender = button.data('whatever6')
            var recipientPhoneNumber = button.data('whatever7r')
            var recipientStreetAddress = button.data('whatever8')
            var recipientStreetNumber = button.data('whatever9')
            var recipientCity = button.data('whatever10')
            var recipientPostalCode = button.data('whatever11')

            var modal = $(this)
            modal.find('#FiscalCode').text(recipientFiscalCode)
            modal.find('.modal-title').text("Informazioni su " + recipientName + " " + recipientSurname)
            modal.find('#Email').text(recipientEmail)
            modal.find('#Dob').text(recipientDob)
            modal.find('#Gender').text(recipientGender)
            modal.find('#PhoneNumber').text(recipientPhoneNumber)
            modal.find('#StreetNumber').text(recipientStreetAddress)
            modal.find('#StreetAddress').text(recipientStreetNumber)
            modal.find('#City').text(recipientCity)
            modal.find('#PostalCode').text(recipientPostalCode)
        })
    });
</script>
<div class="container my-5">
    <div class="row mt-5 py-5" align="center">
        <h1>
            <p color="#000" class="font-weight-bold">Benvenuto Admin {{ $name }} </p>
        </h1>
        <h4>
            <p color="#000" class="mt-2">Da qui potrai gestire ogni entità nel modo più veloce e semplice possibile</p>
        </h4>
        <div class="my-3">
            <h5>
                <p color="#000" align="center">Scegli se visualizzare tutti i dottori oppure effettuare una ricerca specifica.
                </p>
            </h5>
        </div>
    </div>
    <div class="container my-5 " align="center">
        SEARCHBOX
        <div class="row" id="content">
            <table>
            <tr>
                <td>
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
                    <button id="searchid" class="col-md-2 btn mx-3 my-3 quadrato-list font-weight-bold w-100 h-100" data-whatever1="{{ $d->fiscal_code }}" data-whatever2="{{ $nome }}" data-whatever3="{{ $cognome }}" data-whatever4="{{ $email }}" data-whatever5="{{ $d->dob }}" data-whatever6="{{ $d->gender }}" data-whatever7="{{ $d->phone_number }}" data-whatever8="{{ $d->street_address }}" data-whatever9="{{ $d->street_number }}" data-whatever10="{{ $d->city }}" data-whatever11="{{ $d->postal_code }}" data-toggle="modal" data-target="#exampleModal" type="button" onmouseover="this.style.background='#3490dc';this.style.color='#fff';" onmouseout="this.style.background='#fff';this.style.color='#000';">
                    <p align="center" style="margin: auto;">{{ $d->fiscal_code }} {{ $nome }} {{ $cognome }}</p></button>
                    @endforeach
                </td>
                
                </tr>
               
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <div class="row">
            <div class="btn-group-toggle w-100 h-100" data-toggle="buttons">
                <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                    <input type="radio" name="type1">
                    <a href="{{URL::action('DoctorController@create')}}">
                    <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Registra Nuovo Dottore</h4>
                </label>
            </div>
        </div>
    </div>
</div>
@endsection