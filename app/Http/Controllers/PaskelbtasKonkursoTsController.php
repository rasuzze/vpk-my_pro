<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\PerkOrganizacija;
use App\PaskelbtasKonkursoTs;
use App\FileUpload;
use App\User;

class PaskelbtasKonkursoTsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $today = Carbon::today();  
        $today = $today->toDateString();      
        $searchTS = $request->input('search');
        // $pasibaige = $request->get('pasibaige');      
        $konkursai =  PaskelbtasKonkursoTs::orderBy('galiojimo_data', 'DESC');        
                // checkbox condition      
        // if($pasibaige === 'on') {
        //   $konkursai=$konkursai->where('konkurso_data', '>=', $today);
        // }elseif($pasibaige === 'end'){
        //    $konkursai=$konkursai->where('konkurso_data', '<', $today);
        // }elseif($pasibaige === 'all'){
        //   $konkursai =  PaskelbtasKonkursas::orderBy('konkurso_data', 'DESC');
        // }
        if ( isset($searchTS)){
           $konkursai =$konkursai->searchTS($searchTS);
        }                                    
           $konkursai =$konkursai->paginate(10); 
           
       return view('konkursaits.index', compact('searchTS', 'konkursai', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $konkursai = PaskelbtasKonkursoTs::all();
        $pos= PerkOrganizacija::orderBy('pavadinimas', 'ASC')->get();
        return view('konkursaits.create', compact('pos', 'konkursai'));
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
        'paskelb_data'=>'required|date|before:tomorrow', 
        'numeris'=>'required|min:6|max:9',         
        'pavadinimas'=>'required', 
        'nuoroda'=>'required', 
        'galiojimo_data'=>'required|date|after:yesterday', 
        'valanda'=>'nullable',           
        'pastabos'=>'nullable',       
        ]);
        $today = Carbon::today();
        $id=Auth::user()->id;        
       $konkursas = new PaskelbtasKonkursoTs();
       $konkursas->paskelb_data=$request->paskelb_data;
       $konkursas->numeris=$request->numeris;
       $konkursas->pavadinimas=$request->pavadinimas;      
       $konkursas->nuoroda=$request->nuoroda;
       $konkursas->galiojimo_data=$request->galiojimo_data;
       $konkursas->valanda=$request->valanda;
       $konkursas->po_id=$request->po_id;     
       $konkursas->pastabos=$request->pastabos;
       $konkursas->user_id=$id;  
       $konkursas->save();
       // dd(basename($path)) - paima tik failo pavadinima;         
        //php artisan storage:link
       if($request->has('file')) {
        $paths=$request->file('file'); 
         foreach ($paths as $path) {
              $fileupload = new FileUpload();   
              $name = $path->store('public');
               $fileupload->name = basename($name);   //saugom tik failo pavadinima
               $fileupload->paskelbtas_konkurso_ts_id=$konkursas->id;
               $fileupload->save();
            }  
          }      
         return redirect('paskelbtits'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $konkursas = PaskelbtasKonkursoTs::findOrFail($id);
       $files = $konkursas->file_uploads;       
       $pos= PerkOrganizacija::all();
       return view('konkursaiTS.show',compact('konkursas','pos', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $konkursas=PaskelbtasKonkursoTs::FindOrFail($id);
        $files = $konkursas->file_uploads; 
        $pos= PerkOrganizacija::orderBy('pavadinimas', 'ASC')->get();
        return view('konkursaits.edit', compact('konkursas', 'pos', 'files'));
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
        'paskelb_data'=>'required|date', 
        'numeris'=>'required|min:6|max:9',         
        'pavadinimas'=>'required', 
        'nuoroda'=>'required', 
        'galiojimo_data'=>'required|date', 
        'valanda'=>'nullable',       
        'pastabos'=>'nullable',   
        ]);
      
       $konkursas=PaskelbtasKonkursoTs::FindOrFail($id);
       $konkursas->paskelb_data=$request->paskelb_data;
       $konkursas->numeris=$request->numeris;
       $konkursas->pavadinimas=$request->pavadinimas;      
       $konkursas->nuoroda=$request->nuoroda;
       $konkursas->galiojimo_data=$request->galiojimo_data;
       $konkursas->valanda=$request->valanda;
       $konkursas->po_id=$request->po_id;      
       $konkursas->pastabos=$request->pastabos;       
       $konkursas->update();   
       // if($request->has('file')){
       //   $paths=$request->file('file'); 
       //   foreach ($paths as $path) {
       //          $fileupload = new FileUpload();   
       //         $name=$path->store('public');
       //           $fileupload->name = basename($name);   //saugom tik failo pavadinima
       //           $fileupload->paskelbtas_konkurso_ts_id=$konkursas->id;
       //           $fileupload->update();    
       //        } 
       //  } 
       return redirect()->route('paskelbtits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $konkursas=PaskelbtasKonkursoTs::FindOrFail($id);
         $konkursas->delete();       
        return redirect('paskelbtits');
    }
}
