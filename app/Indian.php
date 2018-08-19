<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indian extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'suggested_by', 'category_id'
    ];

    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function users(){

        return $this->belongsToMany('App\User');
    }

    public function elinks(){

        return $this->hasMany('App\Elink');
    }
}
