<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function zone()
    {
        return $this->belongsTo('App\Models\Zone');
    }

    public function recepteurs()
    {
        return $this->hasMany('App\Models\Rcepeteur');
    }

}
