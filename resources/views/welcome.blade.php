@extends('layouts.app')

@section('content')
    <!-- ======= Sezione di benvenuto ======= -->
    <section id="benvenuto" class="d-flex align-items-center">
        <div class="container">
            <h1>Benvenuti in MyDoctor</h1>
            <a href="#accesso" class="btn-get-started scrollto">INIZIAMO</a>
        </div>
    </section>
    <!-- fine  -->

    <main id="main">
        <!-- ======= Perchè noi ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Perchè scegliere MyDoctor?</h3>
                            <p>
                                MyDoctor da la possibilità ai pazienti di mettersi in contatto con il proprio dottore in modo semplice e veloce, senza dover attende o chiamare, direttamente da casa.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-receipt"></i>
                                        <h4>Richiedi una ricetta e fattela inviare comodamente</h4>
                                        <p>Con MyDoctor le ricette potranno essere richieste e visualizzate direttamente dal proprio account.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-cube-alt"></i>
                                        <h4>Prenota una visita per evitare lunghe code</h4>
                                        <p>Grazie alla funzione di prenotazione non si dovrà più rimanere ad aspettare anche
                                            per ore in coda</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-images"></i>
                                        <h4>Richiedi credenziali</h4>
                                        <p>Se sei un paziente e non hai le credenziali richiedile al tuo medico curante, per poter usufruire del servizio.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- fine .content-->
                    </div>
                </div>

            </div>
        </section><!-- Fine Sezione "perchè noi" -->

        <!-- ======= Sezione Accesso ======= -->
        <section id="accesso" class="accesso">
            <div class="container-fluid">

                <div class="row">
                    <div
                        class="col-xl-5 col-lg-6 img-box d-flex justify-content-center align-items-stretch position-relative">
                    </div>
                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>Pensato sia per pazienti che medici</h3>
                        <p>MyDoctor rivoluzionerà il modo di interagire con il proprio medico </p>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-fingerprint"></i></div>
                            <h4 class="title"><a href="{{ route('register') }}">REGISTRAZIONE</a></h4>
                            <p class="description">Registrati a MyDoctor per inziare subito a usufruire delle sue funzionalità. Se sei un paziente richiedi le tue credenziali al tuo medico curante.</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-gift"></i></div>
                            <h4 class="title"><a href="{{ route('login') }}">LOGIN</a></h4>
                            <p class="description">Se sei già all'interno della nostra community, allora accedi per
                                usufruire dei servizi di MyDoctor</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- Fine sezione Accesso -->

        <!-- ======= Sezione counter ======= -->
        <?php
        $doctors = DB::table('doctors')->count();
        $patients = DB::table('patients')->count();
        $buildings = DB::table('buildings')->count();
        $prescriptions = DB::table('prescriptions')->count();
        ?>
        <section id="counts" class="counts">
            <div class="container">

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="icofont-dottori-alt"></i>
                            <span class="count">{{ $doctors }}</span>
                            <p>Medici</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="icofont-patient-bed"></i>
                            <span class="count">{{ $buildings }}</span>
                            <p>Edifici</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="icofont-laboratory"></i>
                            <span class="count">{{ $prescriptions }}</span>
                            <p>Ricette prescritte</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="icofont-award"></i>
                            <span class="count">{{ $patients }}</span>
                            <p>Pazienti</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- Fine sezione counter -->

        <!-- ======= Sezione Servizi ======= -->
        <section id="servizi" class="servizi">
            <div class="container">

                <div class="section-title">
                    <h2>Servizi</h2>
                    <p>Che tu sia medico o paziente MyDoctor ti fornirà tutto ciò di cui hai bisogno</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-heart-beat"></i></div>
                            <h4><a href="{{ route('login') }}">Vedi le tue ricette</a></h4>
                            <p>Una volta effettuato il login ti sarà possibile visualizzare tutte le ricette in tuo possesso.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-drug"></i></div>
                            <h4><a href="">Richiedi una ricetta</a></h4>
                            <p>Il paziente potrà richiedere una ricetta al proprio medico che successivamente verrà convalidata o negata da esso.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-dna-alt-2"></i></div>
                            <h4><a href="">Prendi un appuntamento</a></h4>
                            <p>Prenotare una visita non è mai stato così facile, bastarà scegliere il giorno e l'ora.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-heartbeat"></i></div>
                            <h4><a href="">Registrazione pazienti</a></h4>
                            <p>Il dottore potrà registrare i suoi pazienti sulla piattaforma in maniera comoda e veloce.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-heartbeat"></i></div>
                            <h4><a href="">Mai stato così semplice ed economico</a></h4>
                            <p>Interfaccia intuitiva e veloce per tutte le esigenze. Paga una sola volta, usalo per sempre.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-autism"></i></div>
                            <h4><a href="">Una comoda agenda per appuntamenti</a></h4>
                            <p>Il medico potrà visualizzare i propri appuntamenti comodamente dalla sezione dedicata.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- Fine sezione Servizi -->

        <!-- ======= Creatori ======= -->
        <section id="creatori" class="creatori">
            <div class="container">

                <div class="section-title">
                    <h2>Creatori</h2>
                </div>

                <div class="owl-carousel creatori-carousel">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item" style="box-sizing:0;">
                        <div class="row">
                            <div class="col-lg"> <h3>Rosaria Ciociola</h3><h4>Coder</h4> </div>
                            <div class="col-lg"><h3>Giuseppe Giacalone</h3><h4>Coder</h4></div>
                            <div class="col-lg"><h3>Giulio Milani</h3><h4>Coder</h4></div</div> 
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- Fine sezione Creatori -->
    </main><!-- End #main -->
@endsection
