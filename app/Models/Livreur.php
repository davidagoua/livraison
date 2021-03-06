<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    protected $guarded = [];

    public function livraison()
    {
        return $this->hasMany('App\Models\Livraison');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
