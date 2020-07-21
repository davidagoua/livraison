<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recepteur extends Model
{
    protected $guarded = [];

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function livraison()
    {
        return $this->hasOne('App\Models\Livraison');
    }
}
