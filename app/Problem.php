<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = ['title','notes','image'];

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
}
