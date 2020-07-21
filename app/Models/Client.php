<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune');
    }

    public function livraison()
    {
        return $this->hasMany('App\Models\Livraison');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
