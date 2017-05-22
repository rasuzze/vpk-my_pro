<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaskelbtasKonkursas extends Model
{
    public $timestamps = false;
    public function perk_organizacijas()
    {
        return $this->belongsTo('App\PerkOrganizacija');
    }
    // public function users()
    // {
    //     return $this->belongsTo('App\User');
    // }
    public function scopeSearch($query, $search) 
    {
    	return $query->where('pavadinimas', 'like', '%' .$search. '%')
    		->orWhere('paskelb_data', 'like', '%' .$search. '%')
    		->orWhere('konkurso_data', 'like', '%' .$search. '%')
    		->orWhere('numeris', 'like', '%' .$search. '%');
    }
}
