<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPlanification extends Model
{
    protected $fillable=[

        'name','slug','body'

    ];

    public function  planifications(){
        return $this->hasMany(Planification::class);
    }
}
