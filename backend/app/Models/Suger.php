<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suger extends Model
{
    protected $guarded = [
        'id'
    ];

    public function recipes(){
        return $this->belongsMany('App\Models\recipe');
    }
}
