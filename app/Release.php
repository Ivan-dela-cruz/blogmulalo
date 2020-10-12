<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $fillable=[

        'category_id','meeting_id','slug','body','place','date','hour'

    ];

    public function  category(){
        return $this->belongsTo(CategoryRelease::class,'category_id');
    }
    public function  meeting(){
        return $this->belongsTo(Meeting::class,'meeting_id');
    }

}
