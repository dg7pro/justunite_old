<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'last_login'
    ];

    /**
     * Get all of the user's votes.
     */
    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imagable');
    }


    public function group(){

        return $this->belongsTo('App\Group');
    }

    public function roles(){

        return $this->belongsToMany('App\Role');
    }

    public function knows(){

        return $this->belongsToMany('App\User','know_user','user_id','know_id');
    }

    public function knownBy(){

        return $this->belongsToMany('App\User','know_user','know_id','user_id');
    }

    public function assignRole($role){

        $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    public function hasRole($role){

        if(is_string($role)){
            return $this->roles->contains('name',$role);
        }

        return !!$role->intersect($this->roles)->count();
    }

    public function constituency()
    {
        return $this->belongsTo('App\Constituency');
    }

    public function gender(){
        return $this->belongsTo('App\Gender');
    }
    public function marital(){
        return $this->belongsTo('App\Marital');
    }
    public function age(){
        return $this->belongsTo('App\Age');
    }
    public function religion(){
        return $this->belongsTo('App\Religion');
    }

    /**
     * User belongs to particular education level
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function education(){
        return $this->belongsTo('App\Education');
    }
    public function profession(){
        return $this->belongsTo('App\Profession');
    }

    /**
     * One to One Relation
     * User has one opinion(user can write single opinion)
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function opinion(){
        return $this->hasOne('App\Opinion');
    }

    /**
     * One to One Relation
     * User has one opinion(user can write single opinion)
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function add(){
        return $this->hasOne('App\Add');
    }



    /**
     *
     * User can like many Opinions
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function likeOpinions(){
         return $this->belongsToMany('App\Opinion','opinion_user');
    }


    /**
     *
     * User can like many Professions
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function likeProfessions(){

        return $this->belongsToMany('App\Profession');
    }



}
