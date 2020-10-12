<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planification extends Model
{
    protected $fillable=[

        'category_id','name','slug','description','body','status','file','pdf'

    ];

    public function  category(){
        return $this->belongsTo(CategoryPlanification::class);
    }

}
