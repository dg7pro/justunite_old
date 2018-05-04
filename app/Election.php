<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    /*public function constituencies()
    {
        return $this->belongsToMany('App\Constituency')->using('App\Seat');
    }*/

    public function constituencies()
    {
        return $this->belongsToMany('App\Constituency')->withPivot('electors','voters','turnout','pst','ael','nominations','contestants','forfeited');
    }
}
