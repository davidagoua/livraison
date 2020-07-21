<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function communes()
    {
        return $this->hasMany('App\Models\Commune');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
