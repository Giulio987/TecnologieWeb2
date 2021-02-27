@extends('layouts.app')

@section('content')
    <?php $name = Auth::user()->name; ?>
    <div class="row-space" style="margin-left:100px;float:left;">
        <a href="{{ URL::action('BuildingController@index') }}">
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
                Benvenuto Amministratore! Aggiungi gli edifici dei dottori.
            </h1>
        </div>
        <div class="row row-space justify-content-center">
            <h4>
                ssdssssssssssssssssssssssss
            </h4>
        </div>
        <div class="row row-space justify-content-center">
            <h4>
                sistemareeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
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
                <a href="" id="add-building-btn" class="btn btn-outline-primary" style="float:right">Aggiungi</a>
            </div>
        </div>
        
    </div>
@endsection