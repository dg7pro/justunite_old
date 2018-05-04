<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public $table = "educations";
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){

        return $this->hasMany('App\User');
    }
}
