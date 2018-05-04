<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function users(){

        return $this->hasMany('App\User');
    }

    public function contestants(){

        return $this->hasMany('App\Contestant');
    }
}
