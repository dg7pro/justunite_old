<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = ['name','abbreviation','symbol','year','headquarter','founder','president','leadership','details'];

    /**
     * Many to Many
     * Party is active in many states
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function states()
    {
        return $this->belongsToMany('App\State');
    }

    /**
     * One to Many
     * Party rules over many states
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rules(){

        return $this->hasMany('App\State');
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
