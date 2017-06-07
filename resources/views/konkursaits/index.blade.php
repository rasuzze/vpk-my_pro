@extends('layouts.app')

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-12"><h4>Konkursų techninių specifikacijų sąrašas</h4></div>
  </div>
  <div class="row">  
    <div class="col-md-8 text-right">
      <!-- Search input -->
      <form id="formName" action={{ route('paskelbtits.index') }} method="get" class="form-search form-horizontal pull-right">     
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Ieškoti" value="{{ isset($searchTS) ? $searchTS : '' }}">
          <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></span></button>
          </span> 
        </div> 
        <div class="col-md-6 form-group" style="margin-top: 10px;">
          <!-- uzdet selected ant to, kuris pasirinktas -->
          <select class="form-control" id="pasibaige" name="pasibaige" onchange="sortVal();">
            <option value="" selected="selected">Pasirinkite</option>
            <option value="all">Rodyti visus</option>  
            <option value="on">Nerodyti pasibaigusių konkursų TS</option>
            <option value="end">Rodyti tik pasibaigusius konkursų TS</option>                    
          </select>          
        </div>        
      </form>      
    </div>
    <div class="col-md-4 col-xs-12 text-right">
      @if(auth()->check())
        <a href="paskelbtits/create"><button class="btn btn-primary">Naujas TS projektas</button></a>
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
            <th>Paskelbimo data</th>
            <th>Galiojimo data</th>         
          </tr>
        </thead>
        <tbody>
          @foreach ($konkursai as $konkursas)         
         <tr> 
          <td>{{$konkursas->numeris}}</td>                
           <td style="text-transform: uppercase;"><a href="/paskelbtits/{{$konkursas->id}}">{{$konkursas->pavadinimas}}</a></td>
          <td>{{$konkursas->paskelb_data}}</td>
         
          @if($konkursas->galiojimo_data > $today)
              <td>{{$konkursas->galiojimo_data}}</td>
           
            @elseif($today > $konkursas->galiojimo_data)
             <td style="background-color: #FFFF99">{{$konkursas->galiojimo_data}}</td> 
           
            @elseif($konkursas->galiojimo_data ==  $today)
              <td style="background-color: #red;">{{$konkursas->galiojimo_data}}</td> 
            
          @endif        
           @if(auth()->check())
           <td align="center">
                  <form action="/paskelbtits/{{$konkursas->id}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                      <button class="btn btn-xs btn-default" value="delete"><i class="fa fa-minus" aria-hidden="true"></i></button>
                  </form>                  
            </td>
            <td>
              <a href="/paskelbtits/{{$konkursas->id}}/edit"><button class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
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
                  <li>{{ $konkursai->appends(['searchTS' => $searchTS])->links() }}</li>                
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

