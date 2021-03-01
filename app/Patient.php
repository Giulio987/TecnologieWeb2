<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'fiscal_code', 'dob', 'gender', 'phone_number', 'street_address', 'street_number', 'postal_code', 'city','id_user', 'id_doctor',
    ];

    
    public function prescriptions()
    {
        // Patients:Prescriptions => 1:N
        // hasMany => N
        return $this->hasMany('App\Prescription', 'id_user');
    }

    public function visits()
    {
        // Patients:Prescriptions => 1:N
        // hasMany => N
        return $this->hasMany('App\Visit', 'id_patient');
    }

    public function doctor()
    {
        // Doctors:Patients => 1:N
        // belongsTo => 1
        return $this->belongsTo('App\Doctor', 'id_doctor');
    }

    public function user()
    {
        // Patients:Users => 1:1
        // belongsTo => 1
        return $this->belongsTo('App\Patient', 'id_user');

    }
}
