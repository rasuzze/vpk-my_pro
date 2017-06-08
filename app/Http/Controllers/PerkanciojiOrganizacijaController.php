<?php

namespace App\Http\Controllers;

use Auth;
use App\PerkOrganizacija;
use Illuminate\Http\Request;

class PerkanciojiOrganizacijaController extends Controller
{
     public function index(Request $request)
    {       
        $searchpo = $request->input('search');        
        $pos = PerkOrganizacija::orderBy('pavadinimas', 'ASC');           
       if (isset($searchpo)) {
            $pos =  $pos->searchPo($searchpo); 
       }
        $pos =$pos->paginate(10); 
                 
           // dd($pos);                              
        return view('organizacijos.index', compact('searchpo', 'pos'));
    }
    public function create()
    {    	
        return view('organizacijos.create', compact('pos'));
    }
     public function store(Request $request)
    {
        // validaton
       $this->validate($request, [
        'pavadinimas'=>'required|unique:perk_organizacijas', 
        'kodas'=>'nullable|unique:perk_organizacijas',         
        'adresas'=>'nullable', 
        'email'=>'nullable', 
        'tel'=>'nullable',              
        ]);       
    	$po = new PerkOrganizacija();
    	$po->pavadinimas=$request->pavadinimas;
     	$po->kodas=$request->kodas;
	    $po->adresas=$request->adresas;       
	    $po->email=$request->email;
	    $po->tel=$request->tel;
	    $po->save();           
       
	   return redirect('po');
       
    }
    public function edit($id)
    {
        $organizacija=PerkOrganizacija::FindOrFail($id);  
        return view('organizacijos.edit', compact('organizacija'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
        'pavadinimas'=>'required|', 
        'kodas'=>'nullable',         
        'adresas'=>'nullable', 
        'email'=>'nullable', 
        'tel'=>'nullable',              
        ]);       
        $po = PerkOrganizacija::FindOrFail($id);
        $po->pavadinimas=$request->pavadinimas;
        $po->kodas=$request->kodas;
        $po->adresas=$request->adresas;       
        $po->email=$request->email;
        $po->tel=$request->tel;
        $po->update();    
      
       
       return redirect()->route('po.index');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaskelbtasKonkursas  $paskelbtasKonkursas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $po=PerkOrganizacija::FindOrFail($id);
        $po->delete();       
        return redirect('po');
    }

}
