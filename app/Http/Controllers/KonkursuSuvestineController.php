<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\PaskelbtasKonkursas;
use App\PerkOrganizacija;
use App\FileUpload;
use App\User;
use App\Sutartis;

class KonkursuSuvestineController extends Controller
{
   public function index(Request $request)
    {       
        $today = Carbon::today();  
        $today = $today->toDateString();      
        $search = $request->input('search');
        $pasibaige = $request->get('pasibaige');      
        $konkursai =  PaskelbtasKonkursas::orderBy('konkurso_data', 'desc')->where('konkurso_data', '<', $today)->get(); 
       
        if ( isset($search)){
           $konkursai =$konkursai->search($search);
        }                                    
        //    $konkursai =$konkursai->paginate(10); 
       return view('suvestine.index', compact('search', 'konkursai', 'today'));
    }
     public function edit($id)
    {
        $konkursas=PaskelbtasKonkursas::FindOrFail($id);      
        $pos= PerkOrganizacija::orderBy('pavadinimas', 'ASC')->get();
        return view('suvestine.edit', compact('konkursas', 'pos'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaskelbtasKonkursas  $paskelbtasKonkursas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
    	$konkursas=PaskelbtasKonkursas::FindOrFail($id);
       $konkursas->vieta=$request->vieta;
       $konkursas->maz_kaina=$request->maz_kaina;
       $konkursas->laimetojas=$request->laimetojas;             
       $konkursas->update(); 

       
       return redirect()->route('suvestine.index');
    }
}
