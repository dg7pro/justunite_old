<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'credits', 'user_id', 'votable_id','votable_type',
    ];

    /**
     * Get all of the owning votable models.
     */
    public function votable()
    {
        return $this->morphTo();
    }

    public function deleteVote($vote){

        return $vote->delete();
    }


}
