@extends('home')

@section('content')
<div class="container">
 <div class="row">
    <div class="col-xs-12">    
        <a href="/paskelbtik"><button class="btn btn-sm btn-primary">Grįžti į sąrašą</button></a>
        <a href="/paskelbtik/{{$konkursas->id}}/edit"><button class="btn btn-sm btn-primary">Atnaujinti duomenis</button></a>
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
      <p>Konkurso data:<strong> {{ $konkursas->konkurso_data}}</strong> </p>
    </div>
    <div class="col-md-3">      
      <p>Valanda: <strong>{{ $konkursas->valanda}} </strong></p>
    </div>
  </div>
               
  <div class="row">
    <div class="col-md-3">
      <p style="line-height:34px;">Garantas: <strong>{{ $konkursas->garantas }}</strong></p>
    </div>
    <div class="col-md-9">
      <p style="line-height:34px;">Pastabos: <strong>{{ $konkursas->pastabos }}</strong></p>
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
    <div class="col-md-12"> 
      <p style="line-height:34px;">Konkurso salygos:</p>
      <ul>
      @foreach ($files as $file)     
        <a href="/storage/{{$file['name'] }}">
          <li>{{$file->name}}
            <form action="/file/{{$file->id}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                      <button class="btn btn-xs btn-default" value="delete"><i class="fa fa-minus" aria-hidden="true"></i></button>
                  </form>
          </li>
        </a> 
      @endforeach
      </ul>
    </div>         
  </div>           


</div>


@endsection