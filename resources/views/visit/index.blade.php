@extends('layouts.app')

@section('content')

    @if (!strcmp(Auth::user()->role, '1'))

        <?php
        $name = Auth::user()->name;

        date_default_timezone_set('Europe/Rome');

        $id = Auth::user()->id;
        ?>

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
        
        </div>
        <div class="container-lg" align="center">
            <div class="row row-space justify-content-center">
                <h1 class="font-weight-bold">
                    Benvenuto Amministratore! visualizza tutte le visite.
                </h1>
            </div>
            <div class="row row-space justify-content-center">
                <h4>
                    Modifica, Aggiungi o elimina gli appuntamenti. </h4>
            </div>
            <div class="row row-space justify-content-center">
                <div class="btn-group btn-group-toggle justify-content-center w-100 h-100" data-toggle="buttons">
                    <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
                        <input type="radio" name="visita" value="visitaPassate" onclick="ShowPassate()"
                            style="display:none">
                        <h4 class="font-weight-bold" style="padding:1em;">Visite passate</h4>
                    </label>
                    <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
                        <input type="radio" name="visita" value="visitaFuture" onclick="ShowFuture()" style="display:none">
                        <h4 class="font-weight-bold" style="padding:1em;">Visite future</h4>
                    </label>
                </div>
            </div>
            <div class="table-border" style="display:none;" id="contentFuture">
                <table class="table table-borderless table-hover" style="margin:0px">
                    <thead>
                        <tr class="bg-info" style="color:#fff;text-align:center">
                            <th scope="col"
                                style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">
                                Data</th>
                            <th scope="col"
                                style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 0px 0px 0px;">
                                Ora</th>
                            <th scope="col"
                            style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">
                            Modifica</th>
                        </tr>
                    </thead>

                    @foreach ($visits as $v)
                        @if (strtotime($v->date . ' ' . $v->time) > strtotime(date('Y/m/d H:i')))
                            <!-- visite future -->
                            <tbody>
                                <tr class="font-weight-bold text-uppercase" style="color:#626262;text-align:center;">
                                    <td
                                        style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">
                                        {{ date('d/m/Y', strtotime($v->date)) }}</td>
                                    <td
                                        style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 0px 0px 0px;border-radius: 0px 0px 0px 0px;">
                                        {{ $v->time }}</td>
                                    <td style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">
                                        <a href="{{URL::action('VisitController@edit', $v)}}" class="btn btn-outline-primary btn-sm">Modifica</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
            <div class="table-border" style="display:none;" id="contentPassate">
                <table class="table table-borderless table-hover" style="margin:0px">
                    <thead>
                        <tr class="bg-info" style="color:#fff;text-align:center">
                            <th scope="col"
                                style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">
                                Data</th>
                            <th scope="col"
                                style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 0px 0px 0px;border-radius: 0px 0px 0px 0px;">
                                Ora</th>
                            <th scope="col"
                                style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">
                                Modifica</th>
                        </tr>
                    </thead>
                    @foreach ($visits as $v)
                        @if (strtotime($v->date . ' ' . $v->time) <= strtotime(date('Y/m/d H:i')))
                            <!-- visite passate -->
                            <tbody>
                                <tr class="font-weight-bold text-uppercase" style="color:#626262;text-align:center;">
                                    <td
                                        style="-moz-border-radius: 20px 0px 0px 20px;-webkit-border-radius: 20px 0px 0px 20px;border-radius: 20px 0px 0px 20px;">
                                        {{ date('d/m/Y', strtotime($v->date)) }}</td>
                                    <td
                                        style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 0px 0px 0px;border-radius: 0px 0px 0px 0px;">
                                        {{ $v->time }}</td>
                                    <td style="-moz-border-radius: 0px 20px 20px 0px;-webkit-border-radius: 0px 20px 20px 0px;border-radius: 0px 20px 20px 0px;">
                                        <a href="{{URL::action('VisitController@edit', $v)}}" class="btn btn-outline-primary btn-sm">Modifica</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    @endif
    @if (!strcmp(Auth::user()->role, '2'))
        <?php
        $name = Auth::user()->name;
        $ora = 0;

        date_default_timezone_set('Europe/Rome');

        $time = array('08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '15:00', '15:30', '16:00','16:30', '17:00', '17:30', '18:00', '18:30', '19:00');

        function giornoData($d, $m, $a)
        {
            $gShort = ['Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'];
            $ts = mktime(0, 0, 0, $m, $d, $a);
            $gd = getdate($ts);
            return $gShort[$gd['wday']];
        }
        ?>

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
        <div class="container-lg" align="center">
            <div class="row row-space justify-content-center">
                <h1 class="font-weight-bold">
                    Ciao Dott {{ $name }}, visualizza le tue visite.
                </h1>
            </div>
            <div class="row row-space justify-content-center">
                <h4>
                    Visualizza le tue visite passate o future con il tuo medico di base. </h4>
            </div>
            <div class="row row-space justify-content-center">
                <h5>
                    Seleziona visite passate o future e visualizza le tue visite.
                </h5>
            </div>
            <div class="row row row-space justify-content-center">
                <div class="btn-group-toggle btn w-100 h-100" data-toggle="buttons">
                    <?php
                    $d = date('d');
                    $m = date('m');
                    $y = date('y');
                    $date1 = date('Y/m/d');
                    $gContent1 = giornoData($d, $m, $y);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
                        <input type="radio" name="date" id="date1" value="{{ $date1 }}" onclick="Show1()">
                        <h5 class="my-3">{{ $gContent1 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                    </label>
                    <?php
                    $date = date('Y/m/d');
                    $CalculateDate = strtotime('+1 day', strtotime($date));
                    $date2 = date('Y/m/d', $CalculateDate);
                    $d = date('d', $CalculateDate);
                    $m = date('m', $CalculateDate);
                    $y = date('y', $CalculateDate);
                    $gContent2 = giornoData($d, $m, $y);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2 ">
                        <input type="radio" name="date" id="date2" value="{{ $date2 }}" onclick="Show2()">
                        <h5 class="my-3">{{ $gContent2 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                    </label>
                    <?php
                    $date = date('Y/m/d');
                    $CalculateDate = strtotime('+2 day', strtotime($date));
                    $date3 = date('Y/m/d', $CalculateDate);
                    $d = date('d', $CalculateDate);
                    $m = date('m', $CalculateDate);
                    $y = date('y', $CalculateDate);
                    $gContent3 = giornoData($d, $m, $y);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
                        <input type="radio" name="date" id="date3" value="{{ $date3 }}" onclick="Show3()">
                        <h5 class="my-3">{{ $gContent3 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                    </label>
                    <?php
                    $date = date('Y/m/d');
                    $CalculateDate = strtotime('+3 day', strtotime($date));
                    $date4 = date('Y/m/d', $CalculateDate);
                    $d = date('d', $CalculateDate);
                    $m = date('m', $CalculateDate);
                    $y = date('y', $CalculateDate);
                    $gContent4 = giornoData($d, $m, $y);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
                        <input type="radio" name="date" id="date4" value="{{ $date4 }}" onclick="Show4()">
                        <h5 class="my-3">{{ $gContent4 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                    </label>
                    <?php
                    $date = date('Y/m/d');
                    $CalculateDate = strtotime('+4 day', strtotime($date));
                    $date5 = date('Y/m/d', $CalculateDate);
                    $d = date('d', $CalculateDate);
                    $m = date('m', $CalculateDate);
                    $y = date('y', $CalculateDate);
                    $gContent5 = giornoData($d, $m, $y);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
                        <input type="radio" name="date" id="date5" value="{{ $date5 }}" onclick="Show5()">
                        <h5 class="my-3">{{ $gContent5 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                    </label>
                    <?php
                    $date = date('Y/m/d');
                    $CalculateDate = strtotime('+5 day', strtotime($date));
                    $date6 = date('Y/m/d', $CalculateDate);
                    $d = date('d', $CalculateDate);
                    $m = date('m', $CalculateDate);
                    $y = date('y', $CalculateDate);
                    $gContent6 = giornoData($d, $m, $y);
                    ?>
                    <label class="btn btn-outline-primary col-md-2 quadrato mx-4 mb-2">
                        <input type="radio" name="date" id="date6" value="{{ $date6 }}" onclick="Show6()">
                        <h5 class="my-3">{{ $gContent6 }}</h5>
                        <h3 class="font-weight-bold my-3">{{ $d }}</h3>
                    </label>
                </div>
            </div>

            <div class="row row-space justify-content-center" id="content1" style="display:none">
                @if ($gContent1 != 'Domenica')
                <div class="btn-group-toggle w-100 h-100 col-lg-8" data-toggle="buttons" align="left">
                        @for ($i = 0; $i < count($time); $i++)
                            @if (DB::table('visits')->where('date', $date1)->where('time', $time[$i])->exists() && strtotime($time[$i]) > strtotime(date('H:i'))) 
                            <?php $ora++ ?>
                            <?php
                            $id_p = DB::table('visits')->where('date', $date1)->where('time', $time[$i])->select('id_patient')->get();
                            foreach ($id_p as $pippo) {
                                $info = $pippo->id_patient;
                            }
                            $p = DB::table('patients')->where('id', $info)->get();
                            foreach ($p as $pa) {
                                $fiscal_code = $pa->fiscal_code;
                                $dob = $pa->dob;
                                $phone_number = $pa->phone_number;
                                $gender = $pa->gender;
                                $street_address = $pa->street_address;
                                $street_number = $pa->street_number;
                                $postal_code = $pa->postal_code;
                                $city = $pa->city;
                                $id_user = $pa->id_user;
                            }
                            $user = DB::table('users')->where('id', $id_user)->select('name', 'surname')->get();
                            foreach ($user as $u) {
                                $name = $u->name;
                                $surname = $u->surname;
                            }
                            ?>
                            <label class="btn btn-orario btn-outline-primary font-weight-bold"
                            data-whatever1="{{ $fiscal_code }}" data-whatever2="{{ $name }}"
                            data-whatever3="{{ $surname }}"
                            data-whatever4="{{ date('d/m/Y', strtotime($dob)) }}"
                            data-whatever5="{{ $phone_number }}"
                            data-whatever6="{{ $gender }}"
                            data-whatever7="{{ $street_address }}"
                            data-whatever8="{{ $street_number }}"
                            data-whatever9="{{ $postal_code }}"
                            data-whatever10="{{ $city }}" data-toggle="modal"
                            data-target="#exampleModal2" type="button">
                            <p>{{ $time[$i] }}</p></label> 
                            @endif
                        @endfor
                    </div>
                    @if($ora == 0)
                    @if (strtotime($time[count($time) - 1]) <= strtotime(date('H:i'))) 
                        <div class="row justify-content-center">
                            <div class="alert alert-info col-lg-8" role="alert">
                                <h5>Giornata di lavoro terminata, visualizza le visite dei prossimi giorni</h5>
                            </div>
                        </div>
                    @else
                        <div class="row justify-content-center">
                            <div class="alert alert-info col-lg-6" role="alert">
                                <h5>Non ci sono visite prenotate per oggi.</h5>
                            </div>
                        </div>
                    @endif
                    @endif
                @else
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-3" role="alert">
                                <h5>Giornata libera.</h5>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row row-space justify-content-center" id="content2" style="display:none">
                @if ($gContent2 != 'Domenica')
                <div class="btn-group-toggle w-100 h-100 col-lg-8" data-toggle="buttons" align="left">
                        @for ($i = 0; $i < count($time); $i++)
                            @if (DB::table('visits')->where('date', $date2)->where('time', $time[$i])->exists()) 
                            <?php
                            $id_p = DB::table('visits')->where('date', $date2)->where('time', $time[$i])->select('id_patient')->get();
                            foreach ($id_p as $pippo) {
                                $info = $pippo->id_patient;
                            }
                            $p = DB::table('patients')->where('id', $info)->get();
                            foreach ($p as $pa) {
                                $fiscal_code = $pa->fiscal_code;
                                $dob = $pa->dob;
                                $phone_number = $pa->phone_number;
                                $gender = $pa->gender;
                                $street_address = $pa->street_address;
                                $street_number = $pa->street_number;
                                $postal_code = $pa->postal_code;
                                $city = $pa->city;
                                $id_user = $pa->id_user;
                            }
                            $user = DB::table('users')->where('id', $id_user)->select('name', 'surname')->get();
                            foreach ($user as $u) {
                                $name = $u->name;
                                $surname = $u->surname;
                            }
                            ?>
                            <label class="btn btn-orario btn-outline-primary font-weight-bold"
                            data-whatever1="{{ $fiscal_code }}" data-whatever2="{{ $name }}"
                            data-whatever3="{{ $surname }}"
                            data-whatever4="{{ date('d/m/Y', strtotime($dob)) }}"
                            data-whatever5="{{ $phone_number }}"
                            data-whatever6="{{ $gender }}"
                            data-whatever7="{{ $street_address }}"
                            data-whatever8="{{ $street_number }}"
                            data-whatever9="{{ $postal_code }}"
                            data-whatever10="{{ $city }}" data-toggle="modal"
                            data-target="#exampleModal2" type="button">
                            <p>{{ $time[$i] }}</p></label> @endif
                        @endfor
                    </div>
                    @if (count(DB::table('visits')->where('date', $date2)->get()) == 0)
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non ci sono visite prenotate per oggi.</h5>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-3" role="alert">
                                <h5>Giornata libera.</h5>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row row-space justify-content-center" id="content3" style="display:none">
                @if ($gContent3 != 'Domenica')
                <div class="btn-group-toggle w-100 h-100 col-lg-8" data-toggle="buttons" align="left">
                        @for ($i = 0; $i < count($time); $i++)
                            @if (DB::table('visits')->where('date', $date3)->where('time', $time[$i])->exists()) 
                            <?php
                            $id_p = DB::table('visits')->where('date', $date3)->where('time', $time[$i])->select('id_patient')->get();
                            foreach ($id_p as $pippo) {
                                $info = $pippo->id_patient;
                            }
                            $p = DB::table('patients')->where('id', $info)->get();
                            foreach ($p as $pa) {
                                $fiscal_code = $pa->fiscal_code;
                                $dob = $pa->dob;
                                $phone_number = $pa->phone_number;
                                $gender = $pa->gender;
                                $street_address = $pa->street_address;
                                $street_number = $pa->street_number;
                                $postal_code = $pa->postal_code;
                                $city = $pa->city;
                                $id_user = $pa->id_user;
                            }
                            $user = DB::table('users')->where('id', $id_user)->select('name', 'surname')->get();
                            foreach ($user as $u) {
                                $name = $u->name;
                                $surname = $u->surname;
                            }
                            ?>
                            <label class="btn btn-orario btn-outline-primary font-weight-bold"
                            data-whatever1="{{ $fiscal_code }}" data-whatever2="{{ $name }}"
                            data-whatever3="{{ $surname }}"
                            data-whatever4="{{ date('d/m/Y', strtotime($dob)) }}"
                            data-whatever5="{{ $phone_number }}"
                            data-whatever6="{{ $gender }}"
                            data-whatever7="{{ $street_address }}"
                            data-whatever8="{{ $street_number }}"
                            data-whatever9="{{ $postal_code }}"
                            data-whatever10="{{ $city }}" data-toggle="modal"
                            data-target="#exampleModal2" type="button">
                            <p>{{ $time[$i] }}</p></label> @endif
                        @endfor
                    </div>
                    @if (count(DB::table('visits')->where('date', $date3)->get()) == 0)
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non ci sono visite prenotate per oggi.</h5>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-3" role="alert">
                                <h5>Giornata libera.</h5>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row row-space justify-content-center" id="content4" style="display:none">
                @if ($gContent4 != 'Domenica')
                <div class="btn-group-toggle w-100 h-100 col-lg-8" data-toggle="buttons" align="left">
                        @for ($i = 0; $i < count($time); $i++)
                            @if (DB::table('visits')->where('date', $date4)->where('time', $time[$i])->exists()) 
                            <?php
                            $id_p = DB::table('visits')->where('date', $date4)->where('time', $time[$i])->select('id_patient')->get();
                            foreach ($id_p as $pippo) {
                                $info = $pippo->id_patient;
                            }
                            $p = DB::table('patients')->where('id', $info)->get();
                            foreach ($p as $pa) {
                                $fiscal_code = $pa->fiscal_code;
                                $dob = $pa->dob;
                                $phone_number = $pa->phone_number;
                                $gender = $pa->gender;
                                $street_address = $pa->street_address;
                                $street_number = $pa->street_number;
                                $postal_code = $pa->postal_code;
                                $city = $pa->city;
                                $id_user = $pa->id_user;
                            }
                            $user = DB::table('users')->where('id', $id_user)->select('name', 'surname')->get();
                            foreach ($user as $u) {
                                $name = $u->name;
                                $surname = $u->surname;
                            }
                            ?>
                            <label class="btn btn-orario btn-outline-primary font-weight-bold"
                            data-whatever1="{{ $fiscal_code }}" data-whatever2="{{ $name }}"
                            data-whatever3="{{ $surname }}"
                            data-whatever4="{{ date('d/m/Y', strtotime($dob)) }}"
                            data-whatever5="{{ $phone_number }}"
                            data-whatever6="{{ $gender }}"
                            data-whatever7="{{ $street_address }}"
                            data-whatever8="{{ $street_number }}"
                            data-whatever9="{{ $postal_code }}"
                            data-whatever10="{{ $city }}" data-toggle="modal"
                            data-target="#exampleModal2" type="button">
                            <p>{{ $time[$i] }}</p></label> @endif
                        @endfor
                    </div>
                    @if (count(DB::table('visits')->where('date', $date4)->get()) == 0)
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non ci sono visite prenotate per oggi.</h5>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-3" role="alert">
                                <h5>Giornata libera.</h5>
                        </div>
                    </div>
                @endif
            </div>
            
            <div class="row row-space justify-content-center" id="content5" style="display:none">
                @if ($gContent5 != 'Domenica')
                <div class="btn-group-toggle w-100 h-100 col-lg-8" data-toggle="buttons" align="left">
                        @for ($i = 0; $i < count($time); $i++)
                            @if (DB::table('visits')->where('date', $date5)->where('time', $time[$i])->exists()) 
                            <?php
                            $id_p = DB::table('visits')->where('date', $date5)->where('time', $time[$i])->select('id_patient')->get();
                            foreach ($id_p as $pippo) {
                                $info = $pippo->id_patient;
                            }
                            $p = DB::table('patients')->where('id', $info)->get();
                            foreach ($p as $pa) {
                                $fiscal_code = $pa->fiscal_code;
                                $dob = $pa->dob;
                                $phone_number = $pa->phone_number;
                                $gender = $pa->gender;
                                $street_address = $pa->street_address;
                                $street_number = $pa->street_number;
                                $postal_code = $pa->postal_code;
                                $city = $pa->city;
                                $id_user = $pa->id_user;
                            }
                            $user = DB::table('users')->where('id', $id_user)->select('name', 'surname')->get();
                            foreach ($user as $u) {
                                $name = $u->name;
                                $surname = $u->surname;
                            }
                            ?>
                            <label class="btn btn-orario btn-outline-primary font-weight-bold"
                            data-whatever1="{{ $fiscal_code }}" data-whatever2="{{ $name }}"
                            data-whatever3="{{ $surname }}"
                            data-whatever4="{{ date('d/m/Y', strtotime($dob)) }}"
                            data-whatever5="{{ $phone_number }}"
                            data-whatever6="{{ $gender }}"
                            data-whatever7="{{ $street_address }}"
                            data-whatever8="{{ $street_number }}"
                            data-whatever9="{{ $postal_code }}"
                            data-whatever10="{{ $city }}" data-toggle="modal"
                            data-target="#exampleModal2" type="button">
                            <p>{{ $time[$i] }}</p></label> @endif
                        @endfor
                    </div>
                    @if (count(DB::table('visits')->where('date', $date5)->get()) == 0)
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non ci sono visite prenotate per oggi.</h5>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-3" role="alert">
                                <h5>Giornata libera.</h5>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row row-space justify-content-center" id="content6" style="display:none">
                @if ($gContent6 != 'Domenica')
                <div class="btn-group-toggle w-100 h-100 col-lg-8" data-toggle="buttons" align="left">
                        @for ($i = 0; $i < count($time); $i++)
                            @if (DB::table('visits')->where('date', $date6)->where('time', $time[$i])->exists()) <?php
                            $id_p = DB::table('visits')->where('date', $date6)->where('time', $time[$i])->select('id_patient')->get();
                            foreach ($id_p as $pippo) {
                                $info = $pippo->id_patient;
                            }
                            $p = DB::table('patients')->where('id', $info)->get();
                            foreach ($p as $pa) {
                                $fiscal_code = $pa->fiscal_code;
                                $dob = $pa->dob;
                                $phone_number = $pa->phone_number;
                                $gender = $pa->gender;
                                $street_address = $pa->street_address;
                                $street_number = $pa->street_number;
                                $postal_code = $pa->postal_code;
                                $city = $pa->city;
                                $id_user = $pa->id_user;
                            }
                            $user = DB::table('users')->where('id', $id_user)->select('name', 'surname')->get();
                            foreach ($user as $u) {
                                $name = $u->name;
                                $surname = $u->surname;
                            }
                            ?>
                            <label class="btn btn-orario btn-outline-primary font-weight-bold"
                            data-whatever1="{{ $fiscal_code }}" data-whatever2="{{ $name }}"
                            data-whatever3="{{ $surname }}"
                            data-whatever4="{{ date('d/m/Y', strtotime($dob)) }}"
                            data-whatever5="{{ $phone_number }}"
                            data-whatever6="{{ $gender }}"
                            data-whatever7="{{ $street_address }}"
                            data-whatever8="{{ $street_number }}"
                            data-whatever9="{{ $postal_code }}"
                            data-whatever10="{{ $city }}" data-toggle="modal"
                            data-target="#exampleModal2" type="button">
                            <p>{{ $time[$i] }}</p></label> @endif
                        @endfor
                    </div>
                    @if (count(DB::table('visits')->where('date', $date5)->get()) == 0)
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-6" role="alert">
                        <h5>Non ci sono visite prenotate per oggi.</h5>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="row justify-content-center">
                        <div class="alert alert-info col-lg-3" role="alert">
                                <h5>Giornata libera.</h5>
                        </div>
                    </div>
                @endif
            </div>
        </div>


        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informazioni sul paziente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="FiscalCode"></p>
                        <p id="Name"></p>
                        <p id="Surname"></p>
                        <p id="Dob"></p>
                        <p id="PhoneNumber"></p>
                        <p id="Gender"></p>
                        <p id="StreetAddress"></p>
                        <p id="StreetNumber"></p>
                        <p id="PostalCode"></p>
                        <p id="City"></p>
                    </div>
                </div>
            </div>
        </div>

    @endif
    <!--/////////////////////////////////// PAZIENTE ///////////////////////////////////////-->
    @if (!strcmp(Auth::user()->role, '3'))

        <?php
        $name = Auth::user()->name;

        date_default_timezone_set('Europe/Rome');

        $id = Auth::user()->id;
        $info = DB::table('patients')->where('id_user', $id)->select('id')->get();
        foreach ($info as $patient) {
            $res2 = $patient->id;
        }
        $visits = DB::table('visits')->where('id_patient', $res2)->orderByRaw('date - time DESC')->get();
        ?>

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
        <div class="container-lg" align="center">
            <div class="row row-space justify-content-center">
                <h1 class="font-weight-bold">
                    Ciao {{ $name }}, visualizza le tue visite.
                </h1>
            </div>
            <div class="row row-space justify-content-center">
                <h4>
                    Seleziona e visualizza le tue visite passate o future con il tuo medico di base. </h4>
            </div>
            <div class=" row row-space justify-content-center">
                <h5>
                    Tra le Visite Future puoi selezionare la visita ed eliminarla.<button id="button" type="submit" name="submit" class="btn btn-outline-danger btn-prenota font-weight-bold col-lg-2" style="display:none">-</button>
            </h5>
            </div>


            <div class="row row-space justify-content-center">
                <div class="btn-group btn-group-toggle justify-content-center w-100 h-100" data-toggle="buttons">
                    <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
                        <input type="radio" name="visita" value="visitaPassate" onclick="ShowPassate()"
                            style="display:none">
                        <h4 class="font-weight-bold" style="padding:1em;">Visite passate</h4>
                    </label>
                    <label class="btn btn-outline-primary quadrato-ricetta col-lg-2">
                        <input type="radio" name="visita" value="visitaFuture" onclick="ShowFuture()" style="display:none">
                        <h4 class="font-weight-bold" style="padding:1em;">Visite future</h4>
                    </label>
                </div>
            </div>



            <div class="row row-space justify-content-center" id="contentFuture" style="display:none">
                <div class="btn-group-toggle w-100 h-100 col-lg-10" data-toggle="buttons">
                    @foreach ($visits as $v)
                        @if (strtotime($v->date . ' ' . $v->time) > strtotime(date('Y/m/d H:i')))
                            <!-- visite future -->
                            <label class="btn label-visit btn-outline-primary font-weight-bold">
                            <input type="radio" name="visita" value="{{ $v->id }}">
                            <p>{{ date('d/m/Y', strtotime($v->date)) }}</p>
                            <p>{{ date('H:i', strtotime($v->time)) }}</p>
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="row row-space justify-content-center" id="contentPassate" style="display:none">
                <div class="btn-group-toggle w-100 h-100 col-lg-10" data-toggle="buttons" align="left">
                    @foreach ($visits as $v)
                        @if (strtotime($v->date . ' ' . $v->time) <= strtotime(date('Y/m/d H:i')))
                            <!-- visite passate -->
                            <label class="label-visit" onmouseover="this.style.color='#fff';this.style.backgroundColor='#3490dc'" onmouseout="this.style.color='#5c5c5c';this.style.backgroundColor='#f0f8ff';this.style.borderColor='#3490dc'">
                            <p class="font-weight-bold">{{ date('d/m/Y', strtotime($v->date)) }}</p>
                            <p class="font-weight-bold">{{ date('H:i', strtotime($v->time)) }}</p>
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
