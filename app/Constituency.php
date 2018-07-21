<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $fillable = ['details'];

    /**
     * One to Many (Inverse)
     * Constituency belongs to particular State
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state(){

        return $this->belongsTo('App\State');
    }

    public function members(){

        return $this->hasMany('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ctype()
    {
        return $this->belongsTo('App\Ctype');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contestants(){

        return $this->hasMany('App\Contestant');
    }

   /* public function offices()
    {
        return $this->belongsToMany('App\Office')->withPivot('user_id','active');

    }*/

    /**
     * returns offices which are allocated & active or which are null
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Query\Builder
     */
    public function offices()
    {
        return $this->belongsToMany('App\Office')
            ->withPivot('user_id','active')
            ->where('user_id','=',null)
            ->orWhere('active','=','1')
            ->leftJoin('users','user_id','users.id')
            ->select('offices.id','offices.name','users.name as pivot_user_name');
    }

    public function applications(){

        return $this->belongsToMany('App\Office')
            ->withPivot('user_id','active')
            ->where([
                ['user_id','!=',null],
                ['active','!=',1]
            ])
            ->join('users','user_id','users.id')
            ->select('offices.id','offices.name','users.name as pivot_user_name');
    }

    /**
     * returns offices which are allocated to users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function filled(){

        return $this->belongsToMany('App\Office')
            ->withPivot('user_id','active')
            ->where([
                ['user_id','!=',null],
                ['active','=',1]
                ])
            ->join('users','user_id','users.id')
            ->select('offices.id','offices.name','users.name as pivot_user_name');
    }

    /**
     * returns all offices either allocated or unallocated
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Query\Builder
     */
    public function vacant(){

        return $this->belongsToMany('App\Office')
            ->withPivot('user_id','active')
            ->where('user_id','=',null)
            ->leftJoin('users','user_id','users.id')
            ->select('offices.id','offices.name','users.name as pivot_user_name');
    }

    public function blurbs(){

        return $this->belongsToMany('App\Blurb');
    }

}
