<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'rfe', 'id_patient', 'id_doctor', 'description', 'status', 'date', 'type',
    ];

    public function patient()
    {
        // Patients:Prescriptions => 1:N
        // belongsTo => 1
        return $this->belongsTo('App\Patient', 'id_patient');  
    }

    public function doctor()
    {
        // Doctors:Prescriptions => 1:N
        // belongsTo => 1
        return $this->belongsTo('App\Doctor', 'id_doctor');
    }
}
