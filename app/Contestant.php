<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    /**
     * Get all of the contestant's votes.
     */
    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function Constituency()
    {
        return $this->belongsTo('App\Constituency');
    }

    public function gender(){

        return $this->belongsTo('App\Gender');
    }

    public function party(){

        return $this->belongsTo('App\Party');
    }
}
