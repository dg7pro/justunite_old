<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){

        return $this->hasMany('App\User');
    }
}
