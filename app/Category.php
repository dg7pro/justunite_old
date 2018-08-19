<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function indians(){

        return $this->hasMany('App\Indian');
    }

}
