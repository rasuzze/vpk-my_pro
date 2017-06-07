@extends('layouts.app')

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-2"><h4>Sutarčių sąrašas</h4></div>
    
    <div class="col-md-8 text-right">
      <!-- Search input -->
      <form action={{ route('sutartys.index') }} method="get" class="form-search form-horizontal pull-right">       
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Ieškoti sutarčių" value="{{ isset($searchSu) ? $searchSu : '' }}">
          <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></span></button>
          </span> 
        </div>
        <div class="col-md-6 form-group" style="margin-top: 10px;">
          <!-- uzdet selected ant to, kuris pasirinktas -->
          <select class="form-control" id="pasibaige" name="pasibaige" onchange="sortVal();">
            <option value="" selected="selected">Pasirinkite</option>
            <option value="all">Rodyti visas sutartis</option>  
            <option value="on">Nerodyti pasibaigusių sutarčių</option>
            <option value="end">Rodyti tik pasibaigusias sutartis</option>                    
          </select>          
        </div>  
      </form>
    </div>
    <div class="col-md-2 col-xs-12">
      @if(auth()->check())
        <a href="sutartys/create"><button class="btn btn-primary">Įvesti naują</button></a>
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
            <th>Sutarties data</th>
            <th>Sutartis galioja</th> 
            <th>Organizacija</th>  
            <th></th>  
            <th></th>    
          </tr>
        </thead>

        <tbody>
          @foreach ($sutartys as $sut)         
         <tr> 
          <td>{{$sut->numeris}}</td>
          <td style="text-transform: uppercase;"><a href="/sutartys/{{$sut->id}}">{{$sut->pavadinimas}}</a></td>                     
          <td>{{$sut->sutarties_data}}</td>       
          <td>{{$sut->sutartis_galioja}}</td> 
          <td>{{$sut->perk_organizacijas->pavadinimas}}</td>          
          <td align="center">
                  <form action="sutartys/{{$sut->id}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                      <button class="btn btn-xs btn-default" value="delete"><i class="fa fa-minus" aria-hidden="true"></i></button>
                  </form>                  
          </td>
          <td>
              <a href="/sutartys/{{$sut->id}}/edit"><button class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
          </td>          
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
                  <li>{{ $sutartys->appends(['searchSu' => $searchSu])->links() }}</li>                
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