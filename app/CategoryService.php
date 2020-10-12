<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    protected $fillable=[

        'name','slug','body'

    ];

    public function  services(){
        return $this->hasMany(Service::class);
    }
}
