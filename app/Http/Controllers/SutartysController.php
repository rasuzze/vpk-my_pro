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
        $sutartys = Sutartis::orderBy('sutartis_galioja', 'ASC')->get();     
        $konkursas = PaskelbtasKonkursas::all();   
        $searchSu = $request->input('search');         
       if (isset($searchSu)) {
            $sutartys =  $sutartys->searchSu($searchSu); 
       }
        // $sutartys =$sutartys->paginate(10); 
        return view('sutartys.index', compact('searchSu', 'konkursas', 'sutartys', 'pos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $konkursai = PaskelbtasKonkursas::orderBy('pavadinimas', 'ASC')->get();
       
        return view('sutartys.create', compact('konkursai'));
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
        'sutarties_suma'=>'nullable', 
        'sutartis_galioja'=>'nullable|date|after:yesterday', 
        'pastabos'=>'nullable',              
        ]);       
        $sutartis = new Sutartis();
        $sutartis->pavadinimas=$request->pavadinimas;
        $sutartis->sutarties_data=$request->sutarties_data;
        $sutartis->sutarties_suma=$request->sutarties_suma;       
        $sutartis->sutartis_galioja=$request->sutartis_galioja;
        $sutartis->pastabos=$request->pastabos;
        $sutartis->paskelbtas_konkursas_id=$request->paskelbtas_konkursas_id;  
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
       $sutartys = Sutartis::all();     
       $konkursas = PaskelbtasKonkursas::all();   
       return view('sutartys.show', compact('konkursas','sutartys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
