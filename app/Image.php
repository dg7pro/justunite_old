<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = [
        'credits', 'user_id', 'votable_id','votable_type',
    ];

    public function imagable(){

        return $this->morphTo();
    }
}
