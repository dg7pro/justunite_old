<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function states()
    {
        return $this->belongsToMany('App\State');
    }


}
