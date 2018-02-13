<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function constituencies(){

        return $this->hasMany('App\Constituency');
    }
}
