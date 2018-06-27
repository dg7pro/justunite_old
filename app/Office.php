<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{

    public function constituencies()
    {
        return $this->belongsToMany('App\Constituency')
            ->withPivot('user_id','active')
            ->withTimestamps();
    }


}
