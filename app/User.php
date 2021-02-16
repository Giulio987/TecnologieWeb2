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
        return $this->hasOne('App\Doctor', 'id_user');
    }

    public function patients()
    {
        // Patients:Users => 1:1
        return $this->hasOne('App\Patient', 'id_user');
    }
    
    public function roles()
    {
        // Users:Roles => 1:N
        return $this->hasMany('App\Roles', 'id_roles');
    }
    
    public function hasRole($role)
    {
        return User::where('role', $role)->get();
    }
}
