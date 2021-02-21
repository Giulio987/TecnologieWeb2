@extends('layouts.app')

@section('content')
@if(!strcmp(Auth::user()->role, '1'))
<div class="container mt-5">
  <div class="row card-check my-3">
    <div class="col-md-4 my-3">
      <div class="card h-100 border-card">
        <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
        <button type="button" class="btn btn-outline-primary border-button py-4" href="">
          <p class="card-text font-weight-bold text-uppercase">dottori</p>
        </button>
      </div>
    </div>
    <div class="col-md-4 my-3">
      <div class="card h-100 border-card">
        <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
        <button type="button" class="btn btn-outline-primary border-button py-4" href="{{ URL::action('PatientController@index') }}">
          <p class="card-text font-weight-bold text-uppercase">pazienti</p>
        </button>
      </div>
    </div>
    <div class="col-md-4 my-3">
      <div class="card h-100 border-card">
        <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
        <button type="button" class="btn btn-outline-primary border-button py-4" href="{{ URL::action('PrescriptionController@index') }}">
          <p class="card-text font-weight-bold text-uppercase">prescrizioni</p>
        </button>
      </div>
    </div>
  </div>
  <div class="row card-check my-3">
    <div class="col-md-4 my-3">
      <div class="card h-100 border-card">
        <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
        <button type="button" class="btn btn-outline-primary border-button py-4" href="{{ URL::action('VisitController@index') }}">
          <p class="card-text font-weight-bold text-uppercase">visite</p>
        </button>
      </div>
    </div>
</div>
</div>
   
@endif
@if(!strcmp(Auth::user()->role, '2')) <!-- Dottore -->
<div class="container mt-5">
  <div class="row card-check my-3">
    <div class="col-md-4 my-3">
      <div class="card h-100 border-card">
        <img src="images/relazione-medico-paziente-1024x683.jpg" class="card-img-top dim-img-card" alt="...">
        <a type="button" class="btn btn-outline-primary border-button py-4" href="{{ URL::action('PatientController@index') }}" role="button">
          <p class="card-text font-weight-bold text-uppercase">I tuoi pazienti</p>
        </a>
      </div>
    </div>
    <div class="col-md-4 my-3">
      <div class="card h-100 border-card">
        <img src="images/farmaci-senza-ricetta1.jpg" class="card-img-top dim-img-card" alt="...">
        <a type="button" class="btn btn-outline-primary border-button py-4" href="{{ URL::action('PrescriptionController@index') }}" role="button">
          <p class="card-text font-weight-bold text-uppercase">Ricette per i tuoi pazienti</p>
        </a>
      </div>
    </div>
    <div class="col-md-4  my-3">
      <div class="card h-100 border-card">
        <img src="images/pexels-jess-bailey-designs-1558691.jpg" class="card-img-top dim-img-card" alt="...">
        <a type="button" class="btn btn-outline-primary border-button py-4" href="{{ URL::action('PrescriptionController@index') }}" role="button">
          <p class="card-text font-weight-bold text-uppercase">Visualizza i tuoi appuntamenti</p>
        </a>
      </div>
    </div>
  </div>
</div>
@endif
@if(!strcmp(Auth::user()->role, '3')) <!-- Paziente -->
<div class="container mt-5">
  <div class="row card-check my-3">
    <div class="col-md-6 my-3">
      <div class="card h-100 border-card">
        <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
        <a href="{{ URL::action('VisitController@create') }}">
			<button type="button" class="btn btn-outline-primary border-button py-4" >
				<p class="card-text font-weight-bold text-uppercase">Richiedi una visita dal tuo medico</p>
			</button>
		</a>
      </div>
    </div>
    <div class="col-md-6 my-3">
      <div class="card h-100 border-card">
        <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
		<a href="{{ URL::action('PrescriptionController@create') }}">
			<button type="button" class="btn btn-outline-primary border-button py-4" href="{{ URL::action('PrescriptionController@create') }}">
				<p class="card-text font-weight-bold text-uppercase">Richiedi una ricetta per un farmaco</p>
			</button>
		</a>
      </div>
    </div>
  </div>
  <div class="row card-check my-3">
    <div class="col-md-6 my-3">
      <div class="card h-100 border-card">
        <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
		<a href="{{ URL::action('VisitController@index') }}">
			<button type="button" class="btn btn-outline-primary border-button py-4">
				<p class="card-text font-weight-bold text-uppercase">Visualizza i tuoi appuntamenti</p>
			</button>
		</a>
      </div>
    </div>
    <div class="col-md-6  my-3">
      <div class="card h-100 border-card">
        <img src="images/users/medici.jpg" class="card-img-top dim-img-card" alt="...">
		<a href="{{ URL::action('PrescriptionController@index') }}">
			<button type="button" class="btn btn-outline-primary border-button py-4" >
				<p class="card-text font-weight-bold text-uppercase">Visualizza le tue ricette</p>
			</button>
		</a>
      </div>
    </div>
  </div>
@endif
@endsection
