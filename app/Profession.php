<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }

    /**
     *
     * Profession has many user likes
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userLikes(){

        return $this->belongsToMany('App\User');
    }
}
