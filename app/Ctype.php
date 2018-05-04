<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctype extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function constituencies()
    {
        return $this->hasMany('App\Constituency');
    }
}
