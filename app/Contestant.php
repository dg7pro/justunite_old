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
}
