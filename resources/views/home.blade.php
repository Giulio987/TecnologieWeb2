@extends('layouts.app')

@section('content')
    @if (!strcmp(Auth::user()->role, '1'))
    <div class="container-lg mt-5" align="center">
            <div class="row card-check my-3">

                <div class="col-lg-6 my-3">
                    <a href="{{ URL::action('PatientController@index') }}" onmouseover="mouseOver1()" onmouseout="mouseOut1()">
                        <div class="card h-100 border-card">
                            <img src="images/patient.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                                <p id="card1" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">pazienti</p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 my-3">
                    <a href="{{ URL::action('DoctorController@index') }}" onmouseover="mouseOver2()" onmouseout="mouseOut2()">
                        <div class="card h-100 border-card">
                            <img src="images/dottori.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                                <p id="card2" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">dottori</p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="row card-check my-3">

                <div class="col-lg-4 my-3">
                    <a href="{{ URL::action('VisitController@index') }}" onmouseover="mouseOver3()" onmouseout="mouseOut3()">
                        <div class="card h-100 border-card">
                            <img src="images/visite.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                                <p id="card3" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">visite</p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 my-3">
                    <a href="{{ URL::action('PrescriptionController@index') }}" onmouseover="mouseOver4()" onmouseout="mouseOut4()">
                        <div class="card h-100 border-card">
                            <img src="images/prescriptions.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                            <p id="card4" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">prescrizioni</p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 my-3">
                    <a href="{{ URL::action('BuildingController@index') }}" onmouseover="mouseOver5()" onmouseout="mouseOut5()">
                        <div class="card h-100 border-card">
                            <img src="images/ambulatorio.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                            <p id="card5" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">ambulatori</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    @endif
    @if (!strcmp(Auth::user()->role, '2'))
        <!-- Dottore -->
        <div class="container-lg mt-5" align="center">
            <div class="row card-check my-3">

                <div class="col-lg-4 my-3">
                    <a href="{{ URL::action('PatientController@create') }}" onmouseover="mouseOver2()" onmouseout="mouseOut2()">
                        <div class="card h-100 border-card">
                            <img src="images/registrazionepaziente.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                                <p id="card2" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">registra un paziente</p>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4 my-3">
                    <a href="{{ URL::action('PatientController@index') }}" onmouseover="mouseOver1()" onmouseout="mouseOut1()">
                        <div class="card h-100 border-card">
                            <img src="images/patient.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                                <p id="card1" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">i tuoi pazienti</p>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4 my-3">
                    <a href="{{ URL::action('VisitController@index') }}" onmouseover="mouseOver3()" onmouseout="mouseOut3()">
                        <div class="card h-100 border-card">
                            <img src="images/visit-list.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                                <p id="card3" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">visualizza le visite</p>
                        </div>
                    </a>
                </div>

            </div>
            
            <div class="row card-check my-3">

                <div class="col-lg-4 my-3">
                    <a href="{{ URL::action('PrescriptionController@create') }}" onmouseover="mouseOver5()" onmouseout="mouseOut5()">
                        <div class="card h-100 border-card">
                            <img src="images/create-prescription.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                            <p id="card5" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">crea prescrizione</p>
                        </div>
                    </a>
                </div>


                <div class="col-lg-4 my-3">
                    <a href="{{ URL::action('PrescriptionController@index') }}" onmouseover="mouseOver4()" onmouseout="mouseOut4()">
                        <div class="card h-100 border-card">
                            <img src="images/prescriptions.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                            <p id="card4" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">visualizza prescrizioni</p>
                        </div>
                    </a>
                </div>


                <?php $notification = count(DB::table('prescriptions')->where('status', 'convalidare')->get()); ?>

                <div class="col-lg-4 my-3">
                    <a href="{{ URL::action('PrescriptionController@indexValidate') }}" onmouseover="mouseOver6()" onmouseout="mouseOut6()">
                        <div class="card h-100 border-card">
                            <img src="images/prescription-validate.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                                <p id="card6" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">prescrizioni da convalidare
                                @if($notification > 0)
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell ml-3" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                            </svg>
                            <span class="badge notification align-items-start">{{ $notification }}</span>
                            @endif
                        </p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
   
    @endif
    @if (!strcmp(Auth::user()->role, '3'))
        <!-- Paziente -->
        <div class="container-lg mt-5" align="center">
            <div class="row card-check my-3">

            <div class="col-lg-6 my-3">
                    <a href="{{ URL::action('VisitController@create') }}" onmouseover="mouseOver2()" onmouseout="mouseOut2()">
                        <div class="card h-100 border-card">
                            <img src="images/richiedi-visita.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                                <p id="card2" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">prenota una visita dal tuo medico</p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 my-3">
                    <a href="{{ URL::action('VisitController@index') }}" onmouseover="mouseOver1()" onmouseout="mouseOut1()">
                        <div class="card h-100 border-card">
                            <img src="images/visit-list.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                                <p id="card1" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">visualizza visite</p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="row card-check my-3">

            <div class="col-lg-6 my-3">
                    <a href="{{ URL::action('PrescriptionController@create') }}" onmouseover="mouseOver4()" onmouseout="mouseOut4()">
                        <div class="card h-100 border-card">
                            <img src="images/create-prescription.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                            <p id="card4" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">richiedi una prescrizione dal tuo medico</p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 my-3">
                    <a href="{{ URL::action('PrescriptionController@index') }}" onmouseover="mouseOver3()" onmouseout="mouseOut3()">
                        <div class="card h-100 border-card">
                            <img src="images/prescriptions.jpg" class="card-img-top dim-img-card img-fluid" alt="...">
                                <p id="card3" class="card-text font-weight-bold text-uppercase border-button py-4 btn-outline-primary">visualizza prescrizioni</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    @endif
@endsection
