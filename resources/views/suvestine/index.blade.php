@extends('layouts.app')

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-2"><h4>Konkursų suvestinė</h4></div>
    
    <div class="col-md-8 text-right">
      <!-- Search input -->
      <form id="formName" action={{ route('paskelbtik.index') }} method="get" class="form-search form-horizontal pull-right">     
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Ieškoti" value="{{ isset($search) ? $search : '' }}">
          <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></span></button>
          </span> 
        </div> 
      </form>      
    </div>
    
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable" class="table table-hover">
        <thead>
          <tr>            
            <th>Pavadinimas</th>           
            <th>Konkurso data</th>
            <th>Vieta</th>
            <th>Mažiausia kaina</th> 
            <th>Laimėtojas</th>        
          </tr>
        </thead>
        <tbody>
          @foreach ($konkursai as $konkursas)         
         <tr>                 
           <td style="text-transform: uppercase;">{{$konkursas->pavadinimas}}</td>          
           <td>{{$konkursas->konkurso_data}}</td>
           <td>{{$konkursas->vieta}}</td>
           <td>{{$konkursas->maz_kaina}}</td>
           <td>{{$konkursas->laimetojas}}</td>                  
           @if(auth()->check())           
            <td>
              <a href="/suvestine/{{$konkursas->id}}/edit"><button class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            </td>
           @endif
         </tr>         
         @endforeach
        </tbody>
      </table>     
    </div>
  </div>
 
</div> <!-- Container   -->

@endsection


