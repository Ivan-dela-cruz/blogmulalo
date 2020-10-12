<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryRelease extends Model
{
    protected $fillable=[

        'name','slug','body'

    ];

    public function  release(){
        return $this->hasMany(Release::class);
    }
}
