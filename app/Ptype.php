<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptype extends Model
{
    public function parties()
    {
        return $this->hasMany('App\Party');
    }
}
