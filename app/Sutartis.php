<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sutartis extends Model
{
    public function paskelbtas_konkursas()
    {
        return $this->belongsTo('App\PaskelbtasKonkursas', 'paskelbtas_konkursas_id');
    }
    public function scopeSearchSu($query, $searchSu) 
    {       
    	return $query->where('pavadinimas', 'like', '%' .$searchSu. '%')    	
            ->orWhere('numeris', 'like', '%' .$searchSu. '%');    		   		
    }
    public function perk_organizacijas()
    {
        return $this->belongsTo('App\PerkOrganizacija', 'po_id');
    }
}
