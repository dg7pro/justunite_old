<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    public function roles(){

        return $this->belongsToMany('App\Role');

    }

    public function isAssociatedWithRole($role){

        if(is_string($role)){
            return $this->roles->contains('name',$role);
        }

        foreach($role as $r){
            if($this->isAssociatedWithRole($r->name)){
                return true;
            }
        }

        return false;

        //return !!$role->intersect($this->roles)->count();
    }


}
