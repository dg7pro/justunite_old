<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{

    protected $fillable = ['category','details','image'];

    public function users(){
        return $this->hasMany('App\User');
    }


    public function images()
    {
        return $this->morphMany('App\Image', 'imagable');
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
