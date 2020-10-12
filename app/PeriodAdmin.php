<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodAdmin extends Model
{
    protected $fillable=[

        'start_date','end_date','name'

    ];

    public function  representatives(){
        return $this->hasMany(Representative::class);
    }
    public function  meetings(){
        return $this->hasMany(Meeting::class);
    }

}
