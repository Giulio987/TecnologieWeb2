<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function doctors()
    {
        //Buildings:Doctors => 1:N
        return $this->hasMany('App\Doctor', 'id_building');
    }
}