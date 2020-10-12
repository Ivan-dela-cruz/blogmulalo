<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    protected $fillable=[

        'name','ci','last_name','address','phone','email','email_verified_at','password'

    ];

    public function  request(){
        return $this->hasMany(Request::class);
    }

}
