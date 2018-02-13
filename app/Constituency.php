<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $fillable = ['pc_name'];

    public function state(){

        return $this->belongsTo('App\State');
    }
}
