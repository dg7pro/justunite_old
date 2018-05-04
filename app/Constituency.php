<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $fillable = ['details'];

    /**
     * One to Many (Inverse)
     * Constituency belongs to particular State
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state(){

        return $this->belongsTo('App\State');
    }





    public function members(){

        return $this->hasMany('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ctype()
    {
        return $this->belongsTo('App\Ctype');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contestants(){

        return $this->hasMany('App\Contestant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     */
    public function elections()
    {
        return $this->belongsToMany('App\Election')->withPivot('electors','voters','turnout','pst','ael','nominations','contestants','forfeited');
    }




}
