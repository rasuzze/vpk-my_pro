<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaskelbtasKonkursoTs extends Model
{
    public function perk_organizacijas()
    {
        return $this->belongsTo('App\PerkOrganizacija', 'po_id');
    }
   
    // public function file_uploads()
    // {
    //     return $this->hasMany('App\FileUpload');
    // }
   
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function scopeSearchTS($query, $searchTS) 
    {
        return $query->where('pavadinimas', 'like', '%' .$searchTS. '%')  
            // ->orWhere('paskelb_data', 'like', '%' .$searchTS. '%')
            ->orWhere('galiojimo_data', 'like', '%' .$searchTS. '%');                    
    }
   
}
