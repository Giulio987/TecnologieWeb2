<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctor()
    {
        // Doctors:Users => 1:1
        // hasOne => 1 id_user Chiave Esterna in Doctor
        return $this->hasOne('App\Doctor', 'id_user');
    }

    public function patients()
    {
        // Patients:Users => 1:1
        // hasOne => 1 id_user Chiave Esterna in Patient
        return $this->hasOne('App\Patient', 'id_user');
    }
    
    public function roles()
    {
        // Users:Roles => 1:N
        // hasMany => N
        return $this->hasMany('App\Roles', 'id_roles');
    }
    
}
