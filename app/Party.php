<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    //

    public function states()
    {
        return $this->belongsToMany('App\State');
    }

    /**
     * Get all of the user's votes.
     */
    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imagable');
    }

    public function ptype()
    {
        return $this->belongsTo('App\Ptype');
    }


}
