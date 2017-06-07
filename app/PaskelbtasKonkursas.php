<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use MaddHatter\LaravelFullcalendar\Event;

class PaskelbtasKonkursas extends Model implements \MaddHatter\LaravelFullcalendar\Event
{
    protected $fillable = ['pavadinimas', 'konkurso_data', 'konkurso_data'];
    protected $dates = ['start', 'end'];
    public $timestamps = false;
   
    public function perk_organizacijas()
    {
        return $this->belongsTo('App\PerkOrganizacija', 'po_id');
    }
   
    public function file_uploads()
    {
        return $this->hasMany('App\FileUpload');
    }

    public function sutartis()
    {
        return $this->belongsTo('App\Sutartis');
    }
   
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function scopeSearch($query, $search) 
    {
    	return $query->where('pavadinimas', 'like', '%' .$search. '%')
            ->orWhere('numeris', 'like', '%' .$search. '%')    	
    		->orWhere('konkurso_data', 'like', '%' .$search. '%');    		
    }

/**
     * Get the event's id number
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    public function getEventOptions()
    {
        return [
            'color' => $this->background_color,
            //etc
        ];
    }   

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
   
}

