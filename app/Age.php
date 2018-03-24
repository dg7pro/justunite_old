<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    public function users(){

        return $this->hasMany('App\User');
    }
}
