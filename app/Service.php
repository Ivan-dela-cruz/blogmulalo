<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=[

        'category_id','name','slug','description','body','status','file'

    ];

    public function  category(){
        return $this->belongsTo(CategoryService::class);
    }
    public function  requests(){
        return $this->hasMany(Request::class);
    }
}
