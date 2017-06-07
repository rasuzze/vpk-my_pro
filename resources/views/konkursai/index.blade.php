@extends('layouts.app')

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-2"><h4>Konkursų sąrašas</h4></div>
    
    <div class="col-md-8 text-right">
      <!-- Search input -->
      <form id="formName" action={{ route('paskelbtik.index') }} method="get" class="form-search form-horizontal pull-right">     
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Ieškoti" value="{{ isset($search) ? $search : '' }}">
          <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></span></button>
          </span> 
        </div> 
        <div class="col-md-6 form-group" style="margin-top: 10px;">
          <!-- uzdet selected ant to, kuris pasirinktas -->
          <select class="form-control" id="pasibaige" name="pasibaige" onchange="sortVal();">
            <option value="" selected="selected">Pasirinkite</option>
            <option value="all">Rodyti visus</option>  
            <option value="on">Nerodyti pasibaigusių konkursų</option>
            <option value="end">Rodyti tik pasibaigusius konkursus</option>                    
          </select>          
        </div>        
      </form>      
    </div>
    <div class="col-md-2 col-xs-12">
      @if(auth()->check())
        <a href="paskelbtik/create"><button class="btn btn-primary">Naujas Konkursas</button></a>
      @endif
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable" class="table table-hover">
        
        <thead>
          <tr>
            <th>Numeris</th>             
            <th>Pavadinimas</th>           
            <th>Konkurso data</th>
            <th>Valanda</th>
            <th></th> 
            <th></th>        
          </tr>
        </thead>
        <tbody>
          @foreach ($konkursai as $konkursas)         
         <tr> 
          <td>{{$konkursas->numeris}}</td>                
           <td style="text-transform: uppercase;"><a href="/paskelbtik/{{$konkursas->id}}">{{$konkursas->pavadinimas}}</a></td>
         
          @if($konkursas->konkurso_data > $today)
              <td>{{$konkursas->konkurso_data}}</td>
           
            @elseif($today > $konkursas->konkurso_data)
             <td style="background-color: #FFFF99">{{$konkursas->konkurso_data}}</td> 
           
            @elseif($konkursas->konkurso_data ==  $today)
              <td style="background-color: #red;">{{$konkursas->konkurso_data}}</td> 
            
          @endif
           <td>{{$konkursas->valanda}}</td>
           <!-- Pasiimam is modelio sarysio po -->
         <!--   <td>{{$konkursas->perk_organizacijas->pavadinimas}}</td> -->           
           @if(auth()->check())
           <td align="center">
                  <form action="/paskelbtik/{{$konkursas->id}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                      <button class="btn btn-xs btn-default" value="delete"><i class="fa fa-minus" aria-hidden="true"></i></button>
                  </form>                  
            </td>
            <td>
              <a href="/paskelbtik/{{$konkursas->id}}/edit"><button class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
            </td>           
            @endif
         </tr>         
         @endforeach
        </tbody>
      </table>
     
    </div>
  </div>
  
  <!-- Pagination -->
        <div class="panel-footer">
          <div class="row">            
              <div class="col col-xs-12">
                <ul class="pagination hidden-xs pull-right">
                  <li>{{ $konkursai->appends(['search' => $search])->links() }}</li>                
                </ul>
                <ul class="pagination visible-xs pull-right">
                  <li><a href="#">«</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
            </div>
          </div>
</div> <!-- Container   -->

@endsection

@section('checkboxJquery')

$(document).ready(function(){

    $("#formName").on("change", function(){
        $("#formName").append('selected', true);
        $("#formName").submit();
        preventDefault();
    });
});
@endsection
