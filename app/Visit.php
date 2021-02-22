<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'id_patient', 'id_doctor', 'date', 'time',
    ];

    public function doctor()
    {
        // Doctors:Visits => 1:N
        return $this->belongsTo('App\Doctor', 'id_doctor');
    }

    public function patient()
    {
        // Patients:Visits => 1:N
        return $this->belongsTo('App\Patient', 'id_patient');
    }
}
