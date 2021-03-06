<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
        // Users:Roles => 1:N
        // belongsTo => 1
        return $this->belongsTo('App\User', 'id_user');
    }

}
