<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PerkOrganizacija;
use App\PaskelbtasKonkursas;
use App\Sutartis;

class SutartysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $sutartys = Sutartis::orderBy('sutartis_galioja', 'ASC');     
        $pos = PerkOrganizacija::all();   
        $searchSu = $request->input('search'); 
        $pasibaige = $request->get('pasibaige');        
       if($pasibaige === 'on') {
          $sutartys=$konkursai->where('sutartis_galioja', '>=', $today);
        }elseif($pasibaige === 'end'){
           $sutartys=$konkursai->where('sutartis_galioja', '<', $today);
        }elseif($pasibaige === 'all'){
          $sutartys =  PaskelbtasKonkursas::orderBy('sutartis_galioja', 'ASC');
        }
       if (isset($searchSu)) {
            $sutartys =  $sutartys->searchSu($searchSu); 
       }
        $sutartys =$sutartys->paginate(10); 
        return view('sutartys.index', compact('searchSu', 'pos', 'sutartys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pos = PerkOrganizacija::orderBy('pavadinimas', 'ASC')->get();
       
        return view('sutartys.create', compact('pos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validaton
       $this->validate($request, [
        'pavadinimas'=>'required', 
        'sutarties_data'=>'nullable|date',
        'numeris'=>'required',        
        'sutarties_suma'=>'nullable', 
        'sutartis_galioja'=>'nullable|date|after:yesterday', 
        'pastabos'=>'nullable',              
        ]);       
        $sutartis = new Sutartis();
        $sutartis->numeris=$request->numeris;
        $sutartis->pavadinimas=$request->pavadinimas;
        $sutartis->sutarties_data=$request->sutarties_data;
        $sutartis->sutarties_suma=$request->sutarties_suma;       
        $sutartis->sutartis_galioja=$request->sutartis_galioja;
        $sutartis->pastabos=$request->pastabos;
        $sutartis->po_id=$request->po_id;  
        $sutartis->save();           
       
       return redirect('sutartys');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $sutartis = Sutartis::findOrFail($id);
       $po = PerkOrganizacija::all();   
       return view('sutartys.show', compact('po','sutartis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sutartis=Sutartis::FindOrFail($id);       
        $pos= PerkOrganizacija::orderBy('pavadinimas', 'ASC')->get();
        return view('sutartys.edit', compact('sutartis', 'pos'));
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
        // validaton
       $this->validate($request, [
        'pavadinimas'=>'required', 
        'sutarties_data'=>'nullable|date',
        'numeris'=>'required',        
        'sutarties_suma'=>'nullable', 
        'sutartis_galioja'=>'nullable|date|after:yesterday', 
        'pastabos'=>'nullable',              
        ]);       
        $sutartis = Sutartis::FindOrFail($id);
        $sutartis->numeris=$request->numeris;
        $sutartis->pavadinimas=$request->pavadinimas;
        $sutartis->sutarties_data=$request->sutarties_data;
        $sutartis->sutarties_suma=$request->sutarties_suma;       
        $sutartis->sutartis_galioja=$request->sutartis_galioja;
        $sutartis->pastabos=$request->pastabos;
        $sutartis->po_id=$request->po_id;  
        $sutartis->update();           
       
       return redirect('sutartys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sutartis=Sutartis::FindOrFail($id);
        $sutartis->delete();       
        return redirect('sutartys');
    }
}
