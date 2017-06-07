@extends('home')

@section('content')
<div class="container">
 <div class="row">
    <div class="col-xs-12">    
        <a href="/sutartys"><button class="btn btn-sm btn-primary">Grįžti į sąrašą</button></a>
        <a href="/sutartys/{{$sutartis->id}}/edit"><button class="btn btn-sm btn-primary">Atnaujinti duomenis</button></a>
    </div>   
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <h4><strong>{{ $sutartis->pavadinimas }}</strong></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">      
      <p>Numeris: <strong>{{ $sutartis->numeris}}</strong> </p>
    </div>
    <div class="col-md-3">      
      <p>Sutarties data:<strong> {{ $sutartis->sutarties_data}}</strong> </p>
    </div>
    <div class="col-md-3">      
      <p>Sutartis galioja:<strong> {{ $sutartis->sutartis_galioja}}</strong> </p>
    </div>
    <div class="col-md-3">      
      <p>Sutarties suma: <strong>{{ $sutartis->sutarties_suma}} </strong></p>
    </div>
  </div>
               
  <div class="row">
    <div class="col-md-9">
      <p style="line-height:34px;">Pastabos: <strong>{{ $sutartis->pastabos }}</strong></p>
    </div>
  </div>           
  <div class="row">
    <div class="col-md-8"> 
      <p style="line-height:34px;">Perkančioji organizacija: <strong>{{ $sutartis->perk_organizacijas->pavadinimas}}</strong> </p>
    </div>
  </div>
  <div class="row"> 
    <div class="col-md-4"> 
      <p style="line-height:34px;">Organizacijos kodas: <strong>{{ $sutartis->perk_organizacijas->kodas}}</strong> </p>
    </div>
  </div>
  <div class="row">  
    <div class="col-md-8"> 
      <p style="line-height:34px;">Adresas: <strong>{{ $sutartis->perk_organizacijas->adresas}}</strong> </p>
    </div>       
  </div> 
</div>
@endsection