@extends('layouts.app')

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-4"><h4>Organizacijų sąrašas</h4></div>
    
    <div class="col-md-6 text-right">
      <!-- Search input -->
      <form action={{ route('po.index') }} method="get" class="form-search form-horizontal pull-right">       
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Ieškoti" value="{{ isset($searchpo) ? $searchpo : '' }}">
          <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></span></button>
          </span> 
        </div>  
      </form>

    </div>
    <div class="col-md-2 col-xs-12">
      @if(auth()->check())
        <a href="po/create"><button class="btn btn-primary">Įvesti naują</button></a>
      @endif
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">

      <table id="myTable" class="table table-hover">        
        <thead>
          <tr>            
            <th>Pavadinimas</th>           
            <th>Kodas</th>
            <th>Adresas</th>   
            <th>Email</th>  
            <th>Telefonas</th>    
          </tr>
        </thead>

        <tbody>
          @foreach ($pos as $po)         
         <tr>                 
           <td>{{$po->pavadinimas}}</td>              
           <td>{{$po->kodas}}</td>       
           <td>{{$po->adresas}}</td>
          <td>{{$po->email}}</td>    
          <td>{{$po->tel}}</td>    
          
           @if(auth()->check())
           <td align="center">
                  <form action="po/{{$po->id}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                      <button class="btn btn-xs btn-default" value="delete"><i class="fa fa-minus" aria-hidden="true"></i></button>
                  </form>                  
            </td>
            <td>
              <a href="/po/{{$po->id}}/edit"><button class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
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
                  <li>{{ $pos->appends(['searchpo' => $searchpo])->links() }}</li>                
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