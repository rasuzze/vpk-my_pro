@extends('home')

@section('content')

<div class="container">
 <div class="row">
    <div class="col-xs-12 text-right">    
        <a href="/paskelbtits"><button class="btn btn-sm btn-primary right">Grįžti į sąrašą</button></a>
    </div>   
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <h4><strong>{{ $konkursas->pavadinimas }}</strong></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">      
      <p>Numeris: <strong>{{ $konkursas->numeris}}</strong> </p>
    </div>
    <div class="col-md-3">      
      <p>Paskelbimo data:<strong> {{ $konkursas->paskelb_data}}</strong> </p>
    </div>
    <div class="col-md-3">      
      <p>Galiojimo data:<strong> {{ $konkursas->galiojimo_data}}</strong> </p>
    </div>
    <div class="col-md-3">      
      <p>Valanda: <strong>{{ $konkursas->valanda}} </strong></p>
    </div>
  </div>     
  <div class="row">
    <div class="col-md-6"> 
      <p style="line-height:34px;">Perkančioji organizacija: <strong>{{ $konkursas->perk_organizacijas->pavadinimas}}</strong> </p>
    </div>   
    <div class="col-md-2"> 
      <p style="line-height:34px;">Kodas: <strong>{{ $konkursas->perk_organizacijas->kodas}}</strong> </p>
    </div> 
    <div class="col-md-4"> 
      <p style="line-height:34px;">Adresas: <strong>{{ $konkursas->perk_organizacijas->adresas}}</strong> </p>
    </div>       
  </div>              
   <div class="row">
    <div class="col-md-12"> 
      <span>Nuoroda:</span>     
      <a href="{{ $konkursas->nuoroda}}" style="line-height:34px;">{{ $konkursas->nuoroda}}</a>
    </div>         
  </div>  
   <div class="row">    
    <div class="col-md-9">
      <p style="line-height:34px;">Pastabos: <strong>{{ $konkursas->pastabos }}</strong></p>
    </div>
  </div>        
         


</div>


@endsection