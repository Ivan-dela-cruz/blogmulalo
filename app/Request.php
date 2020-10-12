<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable=[

        'user_service_id','service_id','start_date','end_date','start_hour','end_hour','description'

    ];
    public function  services(){
        return $this->belongsTo(Service::class);
    }
    public function  userServives(){
        return $this->belongsTo(UserService::class);
    }

}
