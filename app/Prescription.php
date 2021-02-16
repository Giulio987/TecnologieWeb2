<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'rfe', 'id_user', 'id_doctor', 'description', 'status', 'date', 'type',
    ];

    public function patient()
    {
        // Patients:Prescriptions => 1:N
        return $this->belongsTo('App\Patient', 'id_patient');  //una prescrizione appartiene a un paziente
    }

    public function doctor()
    {
        // Doctors:Prescriptions => 1:N
        return $this->belongsTo('App\Doctor', 'id_doctor');
    }
}
