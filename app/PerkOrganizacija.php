<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerkOrganizacija extends Model
{
    public $timestamps = false;
    public function paskelbtas_konkursas()
    {
        return $this->hasMany('App\PaskelbtasKonkursas');
    }
}
