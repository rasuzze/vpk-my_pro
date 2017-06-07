<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    public function paskelbtas_konkursas()
    {
        return $this->belongsTo('App\PaskelbtasKonkursas');
    }
    //  public function paskelbtas_konkurso_ts()
    // {
    //     return $this->belongsTo('App\PaskelbtasKonkursoTs');
    // }
}
