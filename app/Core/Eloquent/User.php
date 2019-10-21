<?php

namespace App\Core\Eloquent;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\{Model,SofDeletes};
use Str;

class User extends Model
{
    //
    protected $table = "users";
    protected $connection = "pgsql";

    protected $fillable=['name','email', 'password'];
    
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    //assesor
    public function getNameAttribute($value){
        return Str::upper($value);
    }

    //mutator
    //transforma y guarda
    public function setNameAttribute($value){
        $this->attributes['name']=Str::upper($value);
    } 

    public function setPasswordAttribute($value){
        $this->attributes['password']=bcrypt($value);
    }
}
