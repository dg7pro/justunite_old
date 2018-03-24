<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marital extends Model
{
    public function users(){

        return $this->hasMany('App\User');
    }
}
