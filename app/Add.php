<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    protected $fillable = ['matter','active'];
    /**
     * One to One Relation
     * Opinion belongs to particular user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo('App\User');

    }
}
