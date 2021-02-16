<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
        // Users:Roles => 1:N
        return $this->belongTo('App\User', 'id_user');
    }

}
