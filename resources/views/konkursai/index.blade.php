@extends('layouts.app')

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-2"><h4>Konkursų sąrašas</h4></div>
    
    <div class="col-md-8 text-right">
      <!-- Search input -->
      <form action={{ route('paskelbtik.index') }} method="get" class="form-search form-horizontal pull-right">
        <!-- {{ csrf_field() }} -->
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Ieškoti" value="{{ isset($search) ? $search : '' }}">
          <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></span></button>
          </span> 
        </div>  
      </form>
    </div>
    <div class="col-md-2 col-xs-12">
      @if(auth()->check())
        <a href="paskelbtik/create"><button class="btn btn-primary">Naujas Konkursas</button></a>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table id="myTable" class="table table-hover">
        
        <thead>
          <tr>
            <!-- <th>#</th> -->
            <th>Paskelbimo data</th>
            <th>Numeris</th>
            <th>Pavadinimas</th>
            <th>Nuoroda</th>
            <th>Konkurso data</th>
            <th>Valanda</th>
            <th>PO</th>
            <th>Garantas</th>
            <th>Pastabos</th>
            @if(auth()->check())<th></th><th></th>@endif
          </tr>
        </thead>
        <tbody>
          @foreach ($konkursai as $konkursas)         
         <tr>          
           <td>{{$konkursas->paskelb_data}}</td>
           <td>{{$konkursas->numeris}}</td>
           <td>{{$konkursas->pavadinimas}}</td>
           <td>{{$konkursas->nuoroda}}</td>
           <td>{{$konkursas->konkurso_data}}</td>
           <td>{{$konkursas->valanda}}</td>
           <td>{{$konkursas->po_id}}</td>
           <td>{{$konkursas->garantas}}</td>
           <td>{{$konkursas->pastabos}}</td>
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
            <div class="col col-xs-4"><!-- Page 1 of 5 --></div>
              <div class="col col-xs-8">
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