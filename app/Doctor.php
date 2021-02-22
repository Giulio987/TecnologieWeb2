<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'fiscal_code', 'gender', 'dob', 'phone_number', 'id_building', 'id_user','password',
    ];

    public function building()
    {
        // Buildings:Doctors => 1:N
        return $this->belongsTo('App\Building', 'id_building');
    }  

    public function prescriptions()
    {
        // Doctors:Prescriptions => 1:N
        return $this->hasMany('App\Prescription', 'id_doctor'); 
    }

    public function visits()
    {
        // Doctors:Visits => 1:N
        return $this->hasMany('App\Visit', 'id_doctor'); 
    }

    public function patients()
    {
        // Doctors:Patients => 1:N
        return $this->hasMany('App\Patient', 'id_doctor');
    }

    public function user()
    {
        // Doctors:Users => 1:1
        return $this->belongsTo('App\User', 'id_user');
    }
}
