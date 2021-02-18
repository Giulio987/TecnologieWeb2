@extends('layouts.app')

@section('content')

@if(!strcmp(Auth::user()->role, '2'))

<script type="application/javascript">
    function ShowFarmaco() {

        $("#contentFarmaco").show("slow", function() {

        });
        $("#contentUser").show("slow", function() {

        });

        document.getElementById('contentVisita').style.display = 'none';
        document.getElementById('descriptionFarmaco').name = 'description';
        document.getElementById('descriptionVisita').name = '';

    }

    function ShowVisita() {


        $("#contentVisita").show("slow", function() {

        });
        $("#contentUser").show("slow", function() {

        });
        document.getElementById('contentFarmaco').style.display = 'none';
        document.getElementById('descriptionVisita').name = 'description';
        document.getElementById('descriptionFarmaco').name = '';

    }

    $(document).ready(function() {
        $("#selUser").select2();
    });
</script>

<div class="container my-5">
    <div class="row mt-5 py-5" align="center">
        <h1>
            <p color="#000" class="font-weight-bold">Compila la ricetta del tuo paziente</p>
        </h1>
        <h4>
            <p color="#000" class="mt-2">Compila la ricetta del tuo paziente successivamente potrà essere visualizzata e utilizzata dal paziente.</p>
        </h4>
        <form action="{{ URL::action('PrescriptionController@store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group my-3">
                <h5>
                    <p color="#000" align="center">Seleziona il tipo e scrivi il farmaco o visita specialistica e compila la ricetta del tuo paziente.
                        <button type="submit" name="submit" class="btn btn-outline-success btn-prenota font-weight-bold">+</button>
                    </p>
                </h5>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <p align="center" class="alert alert-danger" style="width: 300px; height:auto; padding:0%; margin:5px;">{{ '*' . $error  }}</p>
                @endforeach
                @endif
            </div>

            <div class="container my-5 " align="center">
                <div class="row">
                    <div class=" btn-group-toggle w-100 h-100" data-toggle="buttons">
                        <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                            <input type="radio" name="type" id="type1" value="farmaco" onclick="ShowFarmaco()">
                            <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Farmaco</h4>
                        </label>
                        <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
                            <input type="radio" name="type" id="type2" value="visita" onclick="ShowVisita()">
                            <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Visita</h4>
                        </label>
                    </div>
                </div>
            </div>




            <div class="container my-5 py-5" align="center">
                <div class="row mt-5">

                    <div class="form-group col-md" style="display:none" id="contentUser">
                        <select id='selUser' name="id_patient" style="width:400px;height:auto;">
                            @foreach ($patient as $patient)
                            <?php
                              $user = DB::table('users')->where('id', $patient->id_user)->select('name', 'surname')->get();
                              foreach ($user as $info) {
                                $nome = $info->name;
                                $cognome = $info->surname;
                              }              
                			      ?>
          
                            <option value="{{ $patient->id }}">{{ $cognome }} - {{ $nome }} -
                                {{ $patient->fiscal_code }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md" id="contentFarmaco" style="display:none">
                        <div>
                            <label class="label-ricetta">
                                <input type="text" class="label-ricetta text-uppercase" placeholder="Inserisci farmaco" class="form-control" id="descriptionFarmaco">
                            </label>
                        </div>
                    </div>

                    <div class="col-md" id="contentVisita" style="display:none">
                        <div>
                            <label class="label-ricetta">
                                <input type="text" class="label-ricetta text-uppercase" placeholder="Inserisci visita" class="form-control" id="descriptionVisita">
                            </label>
                        </div>
                    </div>

                </div>
            </div>

            <input id="id_doctor" name="id_doctor" type="hidden" value="{{ Auth::user()->id }}">
            <input id="status" name="status" type="hidden" value="confermata">
            <input id="date" name="date" type="hidden" value="{{ date('Y-m-d') }}">
        </form>
    </div>

@endif

@if(!strcmp(Auth::user()->role, '3'))

<script type="application/javascript">
  function ShowFarmaco() {
    $("#contentFarmaco").toggle("slow", function() {
      // Animation complete.
    });
    document.getElementById('contentVisita').style.display = 'none';
    document.getElementById('descriptionFarmaco').name = 'description';
    document.getElementById('descriptionVisita').name = '';

  }

  function ShowVisita() {
    $("#contentVisita").toggle("slow", function() {
      // Animation complete.
    });
    document.getElementById('contentFarmaco').style.display = 'none';
    document.getElementById('descriptionVisita').name = 'description';
    document.getElementById('descriptionFarmaco').name = '';

  }
</script>

<div class="container my-5">
  <div class="row mt-5 py-5" align="center">
    <h1>
      <p color="#000" class="font-weight-bold">Richiedi la tua ricetta</p>
    </h1>
    <h4>
      <p color="#000" class="mt-2">Richiedi la tua ricetta quando ti è più comodo, potrà essere convalidata o respinta successivamente.</p>
    </h4>
    <form action="{{ URL::action('PrescriptionController@store') }}" method="POST">
      {{ csrf_field() }}
      <div class="form-group my-3">
        <h5>
          <p color="#000" align="center">Seleziona il tipo e scrivi il farmaco o visita specialistica e richiedi la ricetta al tuo medico.
            <button type="submit" name="submit" class="btn btn-outline-success btn-prenota font-weight-bold">+</button>
          </p>
        </h5>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p align="center" class="alert alert-danger" style="width: 300px; height:auto; padding:0%; margin:5px;">{{ '*' . $error  }}</p>
        @endforeach
        @endif
      </div>
      <div class="container my-5 " align="center">
        <div class="row">
          <div class=" btn-group-toggle w-100 h-100" data-toggle="buttons">
            <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
              <input type="radio" name="type" id="type1" value="farmaco" onclick="ShowFarmaco()">
              <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Farmaco</h4>
            </label>
            <label class="btn btn-outline-primary col-md-2 quadrato-ricetta mx-4 mb-2 w-100 h-100">
              <input type="radio" name="type" id="type2" value="visita" onclick="ShowVisita()">
              <h4 class="font-weight-bold" style="margin-top: 25px; margin-bottom: 25px;">Visita</h4>
            </label>
          </div>
        </div>
      </div>

      <div class="container my-5 py-5" align="center" id="contentFarmaco" style="display:none">
        <div class="row mt-5">
          <div>
            <label class="label-ricetta">
              <input type="" class="label-ricetta text-uppercase" placeholder="Inserisci farmaco" class="form-control" id="descriptionFarmaco">
            </label>
          </div>
        </div>
      </div>


      <div class="container my-5 py-5" align="center" id="contentVisita" style="display:none">
        <div class="row mt-5">
          <div>
            <label class="label-ricetta">
              <input type="" class="label-ricetta text-uppercase" placeholder="Inserisci visita" class="form-control" id="descriptionVisita">
            </label>
          </div>
        </div>
      </div>
		<?php 
			$id = Auth::user()->id;
			$info = DB::table('patients')->where('id_user', $id)->select('id_doctor', 'id')->get();
			foreach ($info as $patient) {
    			$res1 = $patient->id_doctor;
				$res2 = $patient->id;
			}
			
		?>
		<input id="id_doctor" name="id_doctor" type="hidden" value="{{ $res1 }}">
		<input id="id_patient" name="id_patient" type="hidden" value="{{ $res2 }}">
		<input id="status" name="status" type="hidden" value="da confermare">
    <input id="date" name="date" type="hidden" value="{{ date('Y-m-d') }}">
    </form>
  </div>
@endif
  @endsection