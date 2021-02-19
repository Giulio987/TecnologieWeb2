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
        return $this->hasMany('App\Prescription', 'id_user');
    }

    public function visits()
    {
        // Patients:Prescriptions => 1:N
        return $this->hasMany('App\Visti', 'id_user');
    }

    public function doctor()
    {
        // Doctors:Patients => 1:N
        return $this->belongTo('App\Dcotor', 'id_doctor');
    }

    public function user()
    {
        // Patients:Users => 1:1
        return $this->belongsTo('App\Patient', 'id_user');

    }
}
