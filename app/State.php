<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name2','capital','language','literacy','prank','population','urbanp','ruralp','density',
        'sex_ratio','pc','ac','governor','cm','wparty','ruling','opposition'];


    /**
     * Many to Many
     * State has many active parties
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function parties()
    {
        return $this->belongsToMany('App\Party');
    }

    /**
     * One to Many (Inverse)
     * State has one ruling party
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ruling(){

        return $this->belongsTo('App\Party','ruling_id');
    }

    /**
     * One to Many (Inverse)
     * State has one opposition party
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function opposition(){

        return $this->belongsTo('App\Party','opposition_id');
    }

    /**
     * One to Many
     * State has many constituencies
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function constituencies(){

        return $this->hasMany('App\Constituency');
    }

    /**
     * Many to many
     * State has many actively spoken languages
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function languages()
    {
        return $this->belongsToMany('App\Language');
    }

    /**
     * One to many (Inverse)
     * State type - state/union territory
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stype()
    {
        return $this->belongsTo('App\Stype');
    }

}
