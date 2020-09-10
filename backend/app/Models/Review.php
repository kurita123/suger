<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [
        'id'
    ];

    public function user() 
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id')
            ->select('id', 'name');
    }

    public function users() 
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
