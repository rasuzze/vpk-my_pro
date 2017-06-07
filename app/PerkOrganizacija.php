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
    public function paskelbtas_konkurso_ts()
    {
        return $this->hasMany('App\PaskelbtasKonkursoTs');
    }
    public function scopeSearchPo($query, $searchpo) 
    {
    	return $query->where('pavadinimas', 'like', '%' .$searchpo. '%')  
    		->orWhere('adresas', 'like', '%' .$searchpo. '%')
            ->orWhere('kodas', 'like', '%' .$searchpo. '%');    		   		
    }
}
