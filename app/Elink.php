<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'link'
    ];


    public function Indian(){

        return $this->belongsTo('App\Indian');
    }
}
