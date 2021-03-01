<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [ 'street_address', 'street_number', 'postal_code', 'city'];
    
    public function doctors()
    {
        // Buildings:Doctors => 1:N
        // hasMany => N
        return $this->hasMany('App\Doctor', 'id_building');
    }
}