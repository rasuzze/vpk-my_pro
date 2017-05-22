<?php

namespace App\Http\Controllers;

use App\PaskelbtasKonkursas;
use App\PerkOrganizacija;
use Illuminate\Http\Request;



class PaskelbtasKonkursasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $konkursai = PaskelbtasKonkursas::latest()
                  ->search($search)
                  ->paginate(8);
        $pos= PerkOrganizacija::all();
                
       return view('konkursai.index', compact( 'search', 'konkursai','pos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pos= PerkOrganizacija::all();
        return view('konkursai.create', compact('pos'));
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
        'paskelb_data'=>'required|date', 
        'numeris'=>'required|min:6|max:9',         
        'pavadinimas'=>'required', 
        'nuoroda'=>'required', 
        'konkurso_data'=>'required|date', 
        // 'valanda'=>'required|min:2',
        // 'garantas'=>'required',   
        'pastabos'=>'nullable',       
        ]);
        
       $konkursas = new PaskelbtasKonkursas();
       $konkursas->paskelb_data=$request->paskelb_data;
       $konkursas->numeris=$request->numeris;
       $konkursas->pavadinimas=$request->pavadinimas;
       // $path = $request->file('picture')->store('public');
       $konkursas->nuoroda=$request->nuoroda;
       $konkursas->konkurso_data=$request->konkurso_data;
       $konkursas->valanda=$request->valanda;
       $konkursas->po_id=$request->po_id;
       $konkursas->garantas=$request->garantas;
       $konkursas->pastabos=$request->pastabos;
       // $konkursas->user_id=$request->user_id;
       // dd(basename($path)) - paima tik failo pavadinima;
       // $product->picture = basename($path);
       $konkursas->save();     
       // session()->flash('message', "You've created new product successfully");
       return redirect('paskelbtik');
    }
    
   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaskelbtasKonkursas  $paskelbtasKonkursas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $konkursas=PaskelbtasKonkursas::FindOrFail($id);
        $pos= PerkOrganizacija::all();
        return view('konkursai.edit', compact('konkursas', 'pos'));
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
       //  $this->validate($request, [
       //  'title'=>'required|min:5|max:20', 
       //  'description'=>'required',         
       //  'price'=>'required', 
       //  'picture'=>'required', 
       //  'category_id'=>'required',
       //  ]);
      
       $konkursas=PaskelbtasKonkursas::FindOrFail($id);
       // $konkursas = new PaskelbtasKonkursas();       
       $konkursas->paskelb_data=$request->paskelb_data;
       $konkursas->numeris=$request->numeris;
       $konkursas->pavadinimas=$request->pavadinimas;      
       $konkursas->nuoroda=$request->nuoroda;
       $konkursas->konkurso_data=$request->konkurso_data;
       $konkursas->valanda=$request->valanda;
       $konkursas->po_id=$request->po_id;
       $konkursas->garantas=$request->garantas;
       $konkursas->pastabos=$request->pastabos;       
       $konkursas->update();         
       return redirect()->route('paskelbtik');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaskelbtasKonkursas  $paskelbtasKonkursas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konkursas=PaskelbtasKonkursas::FindOrFail($id);
         $konkursas->delete();
         // session()->flash('deletemessage', "You've deleted product successfully"); 
        return redirect('paskelbtik');
    }
}
