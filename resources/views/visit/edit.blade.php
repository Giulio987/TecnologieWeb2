@extends('layouts.app')

@section('content')

<div class="container">
    <h1> Modifica Le Informazioni Sulla Visita</h1>

    <form action="{{ URL::action('VisitController@update', $visit) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" name="date" value="{{ $visit->date }}">
            <small class="form-text text-muted">Modifica la data della visita</small>
        </div>
        <div class="form-group">
          <label for="time">Orario selezionato: </label>
          <label for="time">{{ $visit->time }}</label>
          <br>
          <select name="time" id="time">
            <option value="08:30:00">8:30</option>
            <option value="09:00:00">9:00</option>
            <option value="09:30:00">9:30</option>
            <option value="10:00:00">10:00</option>
            <option value="10:30:00">10:30</option>
            <option value="11:00:00">11:00</option>
            <option value="11:30:00">11:30</option>
            <option value="12:00:00">12:00</option>
            <option value="12:30:00">12:30</option>
            <option value="13:00:00">13:00</option>
            <option value="13:30:00">13:30</option>
            <option value="14:00:00">14:00</option>
            <option value="14:30:00">14:30</option>
            <option value="15:00:00">15:00</option>
            <option value="15:30:00">15:30</option>
            <option value="16:00:00">16:00</option>
            <option value="16:30:00">16:30</option>
            <option value="17:00:00">17:00</option>
            <option value="17:30:00">17:30</option>
            <option value="18:00:00">18:00</option>
            <option value="18:30:00">18:30</option>
            <option value="19:00:00">19:00</option>
          </select>          
          <small class="form-text text-muted">Modifica l'ora della visita</small>
        </div>
        <div class="form-group">
            <label for="id_doctor">Id Dottore</label>
            <input type="number" class="form-control @error('id_doctor') is-invalid @enderror" name="id_doctor" value="{{ $visit->id_doctor }}">
            <small class="form-text text-muted">Modifica l'Id del dottore</small>
            @error('id_doctor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_patient">Id Paziente</label>
            <input type="number" class="form-control @error('id_patient') is-invalid @enderror" name="id_patient" value="{{ $visit->id_patient }}">
            <small class="form-text text-muted">Modifica l'Id del paziente</small>
            @error('id_patient')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Aggiorna</button>
        
        <a href="{{ URL::action('VisitController@destroy', $visit) }}" class="btn btn-danger">Cancella</a>

        <a href="{{ URL::action('VisitController@index') }}" class="btn btn-secondary">Indietro</a>

    </form>    
</div>

@endsection