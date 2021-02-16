<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public function doctor()
    {
        // Doctors:Visits => 1:N
        return $this->belongTo('App\Doctor', 'id_doctor');
    }

    public function patient()
    {
        // Patients:Visits => 1:N
        return $this->belongTo('App\Patient', 'id_patient');
    }
}
