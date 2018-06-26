<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blurb extends Model
{
    public function constituencies(){

        return $this->belongsToMany('App\Constituency');

    }
}
