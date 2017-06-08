<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Auth;
use Auth;
use Carbon\Carbon;
use App\PaskelbtasKonkursas;
use App\PerkOrganizacija;
use App\FileUpload;
use App\User;
use App\Sutartis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaskelbtasKonkursasController extends Controller
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
        $search = $request->input('search');
        $pasibaige = $request->get('pasibaige');  

        $konkursai =  PaskelbtasKonkursas::orderBy('konkurso_data', 'ASC');        
                // checkbox condition      
        if($pasibaige === 'on') {
          $konkursai=$konkursai->where('konkurso_data', '>=', $today);
        }elseif($pasibaige === 'end'){
           $konkursai=$konkursai->where('konkurso_data', '<', $today);
        }elseif($pasibaige === 'all'){
          $konkursai =  PaskelbtasKonkursas::orderBy('konkurso_data', 'ASC');
        }
        if ( isset($search)){
           $konkursai =$konkursai->search($search);
        }                                    
           $konkursai =$konkursai->paginate(10); 
       return view('konkursai.index', compact('search', 'konkursai', 'today'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {       
       $konkursas = PaskelbtasKonkursas::findOrFail($id);
       $files = $konkursas->file_uploads;       
       $pos= PerkOrganizacija::all();
       return view('konkursai.show',compact('konkursas','pos', 'files'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $konkursai = PaskelbtasKonkursas::all();
        $pos= PerkOrganizacija::orderBy('pavadinimas', 'ASC')->get();
        return view('konkursai.create', compact('pos', 'konkursai'));
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
        'numeris'=>'required|min:6|max:9|unique:paskelbtas_konkursas',         
        'pavadinimas'=>'required', 
        'nuoroda'=>'required', 
        'konkurso_data'=>'required|date|after:yesterday', 
        'valanda'=>'required',
        'garantas'=>'required',   
        'pastabos'=>'nullable',       
        ]);
        $today = Carbon::today();
        $id=Auth::user()->id;        
       $konkursas = new PaskelbtasKonkursas();
       $konkursas->paskelb_data=$request->paskelb_data;
       $konkursas->numeris=$request->numeris;
       $konkursas->pavadinimas=$request->pavadinimas;      
       $konkursas->nuoroda=$request->nuoroda;
       $konkursas->konkurso_data=$request->konkurso_data;
       $konkursas->valanda=$request->valanda;
       $konkursas->po_id=$request->po_id;
       $konkursas->garantas=$request->garantas;
       $konkursas->pastabos=$request->pastabos;
       $konkursas->user_id=$id;  
       $konkursas->save();
       // dd(basename($path)) - paima tik failo pavadinima;         
        //php artisan storage:link
       if($request->hasFile('file')) {
        $paths=$request->file('file'); 
          foreach ($paths as $path) {
              $fileupload = new FileUpload();   
              $namefile = $path->store('public');                      
               $fileupload->name = basename($namefile);            
               $fileupload->paskelbtas_konkursas_id=$konkursas->id;
               $fileupload->save();
            }  
        }      
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
        $files = $konkursas->file_uploads; 
        $pos= PerkOrganizacija::orderBy('pavadinimas', 'ASC')->get();
        return view('konkursai.edit', compact('konkursas', 'pos', 'files'));
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
        $this->validate($request, [
        'paskelb_data'=>'required|date', 
        'numeris'=>'required|min:6|max:9',         
        'pavadinimas'=>'required', 
        'nuoroda'=>'required', 
        'konkurso_data'=>'required|date', 
        'valanda'=>'required',
        'garantas'=>'required',   
        'pastabos'=>'nullable',   
        ]);
      
       $konkursas=PaskelbtasKonkursas::FindOrFail($id);
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

       if($request->hasFile('file')){      
         $paths=$request->file('file');        
         foreach ($paths as $path) {
          $name = $path->store('public');         
            $file = new FileUpload();                                
            $file->name = basename($name);            
            $file->paskelbtas_konkursas_id=$konkursas->id;
            $file->save();           
        }
      }
       return redirect()->route('paskelbtik.index');
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
        $fileid=$konkursas->id;        
        $files = FileUpload::all();        
        foreach ($files as $file) {
          if ($file->paskelbtas_konkursas_id === $fileid) {
            $file->delete();           
          }           
        }                
        $konkursas->delete();       
        return redirect('paskelbtik');
    }   
}
