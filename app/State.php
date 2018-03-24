<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name2','capital','language','literacy','prank','population','urbanp','ruralp','density','sex_ratio','pc','ac','governor','cm','wparty'];

    public function constituencies(){

        return $this->hasMany('App\Constituency');
    }

    public function parties()
    {
        return $this->belongsToMany('App\Party');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Language');
    }

    public function stype()
    {
        return $this->belongsTo('App\Stype');
    }

}
