<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    protected $fillable=[

        'period_id','name','last_name','ci','email','position','address','phone','file'

    ];

    public function  periodsAdmin(){
        return $this->belongsTo(PeriodAdmin::class);
    }
    public function  meetings(){
        return $this->hasMany(Meeting::class);
    }

}
