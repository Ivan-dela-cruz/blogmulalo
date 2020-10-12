<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable=[

        'period_id','representative_id','slug','topic'

    ];

    public function  period_admin(){
        return $this->belongsTo(PeriodAdmin::class,'period_id');
    }
    public function  representative(){
        return $this->belongsTo(Representative::class);
    }
    public function  release(){
        return $this->hasMany(Release::class);
    }
}
