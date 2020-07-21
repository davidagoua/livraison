<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $guarded = [];

    public function livreur()
    {
        return $this->belongsTo('App\Models\Livreur');
    }

    public function recepteur()
    {
        return $this->hasOne('App\Models\Recepteur');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function getFrais()
    {
        switch (true){
            case $this->client()->commune->zone() == $this->recepteur()->commune->zone():
                return env('FRAIS_INTERCOMMUNE');
                break;
            case $this->client()->commune->zone() != $this->recepteur()->commune->zone():
                return env('FRAIS_INTERZONE');
            default:
                return env('FRAIS_STANDART');
        }
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
