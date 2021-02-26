@extends('layouts.app')

@section('content')
    @if (!strcmp(Auth::user()->role, '1'))
    <div class="container mt-5">
            <div class="row card-check my-3">

                <div class="col-md-6 my-3">
                    <a href="{{ URL::action('PatientController@index') }}" onmouseover="mouseOver1()" onmouseout="mouseOut1()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                                <p id="card1" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">pazienti</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 my-3">
                    <a href="{{ URL::action('DoctorController@index') }}" onmouseover="mouseOver2()" onmouseout="mouseOut2()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                                <p id="card2" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">dottori</p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="row card-check my-3">

                <div class="col-md-4 my-3">
                    <a href="{{ URL::action('VisitController@index') }}" onmouseover="mouseOver3()" onmouseout="mouseOut3()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                                <p id="card3" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">visite</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 my-3">
                    <a href="{{ URL::action('PrescriptionController@index') }}" onmouseover="mouseOver4()" onmouseout="mouseOut4()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                            <p id="card4" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">prescrizioni</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 my-3">
                    <a href="{{ URL::action('BuildingController@index') }}" onmouseover="mouseOver5()" onmouseout="mouseOut5()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                            <p id="card5" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">edifici</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    @endif
    @if (!strcmp(Auth::user()->role, '2'))
        <!-- Dottore -->
        <div class="container mt-5">
            <div class="row card-check my-3">

                <div class="col-md-6 my-3">
                    <a href="{{ URL::action('PatientController@index') }}" onmouseover="mouseOver1()" onmouseout="mouseOut1()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                                <p id="card1" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">i tuoi pazienti</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 my-3">
                    <a href="{{ URL::action('PatientController@create') }}" onmouseover="mouseOver2()" onmouseout="mouseOut2()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                                <p id="card2" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">registra un paziente</p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="row card-check my-3">

                <div class="col-md-4 my-3">
                    <a href="{{ URL::action('VisitController@index') }}" onmouseover="mouseOver3()" onmouseout="mouseOut3()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                                <p id="card3" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">visualizza le visite</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 my-3">
                    <a href="{{ URL::action('PrescriptionController@index') }}" onmouseover="mouseOver4()" onmouseout="mouseOut4()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                            <p id="card4" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">visualizza prescrizioni</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 my-3">
                    <a href="{{ URL::action('PrescriptionController@create') }}" onmouseover="mouseOver5()" onmouseout="mouseOut5()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                            <p id="card5" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">crea prescrizione</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
   
    @endif
    @if (!strcmp(Auth::user()->role, '3'))
        <!-- Paziente -->
        <div class="container mt-5">
            <div class="row card-check my-3">

                <div class="col-md-6 my-3">
                    <a href="{{ URL::action('VisitController@index') }}" onmouseover="mouseOver1()" onmouseout="mouseOut1()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                                <p id="card1" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">visualizza visite</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 my-3">
                    <a href="{{ URL::action('VisitController@create') }}" onmouseover="mouseOver2()" onmouseout="mouseOut2()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                                <p id="card2" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">prenota una visita dal tuo medico</p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="row card-check my-3">

                <div class="col-md-6 my-3">
                    <a href="{{ URL::action('PrescriptionController@index') }}" onmouseover="mouseOver3()" onmouseout="mouseOut3()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                                <p id="card3" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">visualizza prescrizioni</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 my-3">
                    <a href="{{ URL::action('PrescriptionController@create') }}" onmouseover="mouseOver4()" onmouseout="mouseOut4()">
                        <div class="card h-100 border-card">
                            <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
                            <p id="card4" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">richiedi una prescrizione dal tuo medico</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    @endif
@endsection
