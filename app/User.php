<?php

namespace App;

use App\Mail\OTPMail;
use App\Notifications\MobileVerificationOTP;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'uuid', 'invisible', 'em_verified', 'mb_verified'
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
     * Always capitalize the first name when we save it to the database
     */
    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

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

    public function indians(){

        return $this->belongsToMany('App\Indian');
    }

    /**
     * Function gets back the OTP stored in Cache
     * for matching and further use
     * @return mixed
     */
    public function OTP(){

        return Cache::get($this->OTPKey());
    }

    /**
     * Function just creates and returns the OTP Key for specific user
     * Example of Key is OTP_for_27 means OTP for User with id 27
     * @return string
     */
    public function OTPKey(){

        return "OTP_for_{$this->id}";
    }

    /**
     * Function to cache the OTP
     * This function puts the OTP a random 4 digits no. into cache memory
     * @return int
     */
    public function cacheTheOTP(){

        $OTP = rand(1000,9999);
        Cache::put([$this->OTPKey()=>$OTP],Carbon::now()->addMinutes(15));
        return $OTP;

    }

    public function userEmail(){

        return $this->email;
    }

    /**
     * Function mails the OTP to specific user
     * on user email
     */
    public function sendOTP(){

        Mail::to($this->userEmail())->send(new OTPMail($this->cacheTheOTP()));
    }


    /*
     * Below are all the functions of mobile
     * verification through sending One Time Password
     * (OTP)on user's mobile
     *
     * */

    /**
     * Function gets back the OTP stored in Cache
     * for matching and further use
     * @return mixed
     */
    /*public function mbOTP(){

        return Cache::get($this->mbOTPKey());
    }*/

    /**
     * Function just creates and returns the OTP Key for specific user
     * Example of Key is OTP_for_27 means OTP for User with id 27
     * @return string
     */
    /*public function mbOTPKey(){

        return "mbOTP_for_{$this->id}";
    }*/

    /**
     * Function to cache the OTP
     * This function puts the OTP a random 4 digits no. into cache memory
     * @return int
     */
   /* public function cacheTheMbOTP(){

        $mbOTP = rand(1000,9999);
        Cache::put([$this->mbOTPKey()=>$mbOTP],Carbon::now()->addMinutes(15));
        return $mbOTP;

    }*/

    /*public function userMobile(){

        return $this->mobile;
    }*/

    /**
     * Function mails the OTP to specific user
     * on user email
     */
    public function sendMobileOTP(){

        $this->notify(new MobileVerificationOTP($this->cacheTheOTP()));

        //Mail::to($this->userMobile())->send(new OTPMail($this->cacheTheOTP()));
    }

    public function routeNotificationForKarix()
    {
        $mb = '+91'.$this->mobile;
        return $mb;
    }





}
