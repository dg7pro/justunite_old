<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $fillable = ['details'];

    public function state(){

        return $this->belongsTo('App\State');
    }

    public function members(){

        return $this->hasMany('App\User');
    }

    public function ctype()
    {
        return $this->belongsTo('App\Ctype');
    }


}
