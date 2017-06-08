@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-6"><h4>Atnaujinti duomenis</h4></div>
    <div class="col-xs-6 text-right">    
        <a href="/paskelbtik"><button class="btn btn-sm btn-primary right">Grįžti į konkursų sąrašą</button></a> 
        <a href="/paskelbtik/{{$konkursas->id}}"><button class="btn btn-sm btn-primary right">Grįžti į peržiūrą</button></a>   
    </div>    
  </div>
  <!-- Edit Form -->
  <form action="/paskelbtik/{{$konkursas->id}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="patch">
    <fieldset>
      <div class="row">
        <div class="col-md-4 col-xs-6">
          Paskelbimo data:
          <div class="form-group">
            <input type="date" class="form-control" name="paskelb_data" value="{{ $konkursas->paskelb_data }}">
          </div>
        </div>
        <div class="col-md-2 col-xs-6">
          Numeris:
          <div class="form-group">
            <input type="number" class="form-control" name="numeris" value="{{ $konkursas->numeris }}">
          </div>
        </div>
        <div class="col-md-2 col-xs-6">
          Konkurso data:
           <div class="form-group">
             <input type="date" class="form-control" name="konkurso_data" value="{{ $konkursas->konkurso_data }}">
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          Valanda:
          <div class="form-group">
            <input type="text" class="form-control" name="valanda" value="{{ $konkursas->valanda }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          Pavadinimas:
          <div class="form-group">
            <input type="text" class="form-control" name="pavadinimas" value="{{ $konkursas->pavadinimas }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            Nuoroda:
          <div class="form-group">
            <input type="text" class="form-control" name="nuoroda" value="{{ $konkursas->nuoroda }}">
          </div>
        </div>
      </div>          

      <div class="row">
        <div class="col-md-6">
          Perkančioji organizacija:
            <div class="form-group">
              <select class="form-control" name="po_id" id="po_id">                   
                @foreach ($pos as $po)
                  <option value="{{ $po['id'] }}">{{ $po['pavadinimas'] }}</option>
                @endforeach
              </select>
            </div>
          </div> 
          <div class="col-md-2 col-sm-6">
              Garantas:
            <div class="form-group">
              <select name="garantas" class="form-control">
                <option value="{{ $konkursas->garantas }}">{{ $konkursas->garantas }}</option>
                <option value="Tap">Taip</option>
                <option value="Ne">Ne</option>
              </select>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
              Pastabos:
            <div class="form-group">
              <input type="text" class="form-control" name="pastabos" value="{{ $konkursas->pastabos }}">
            </div>
          </div>
        </div>
        <div class="row">            
          <div class="col-md-6">
            <input type="file" name="file[]" multiple>
          </div>
          <div class="form-group">
            <div class="col-md-12 text-right">
              <input class="btn btn-sm btn-primary" type="submit" value="Atnaujinti duomenis">              
            </div>          
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"> 
            <p style="line-height:34px;">Konkurso dokumentai:</p>
            <ul>
            @foreach ($files as $file)     
              <a href="/storage/{{$file['name'] }}"><li>{{$file->name}}</li></a> 
            @endforeach
          </ul>
          </div>         
        </div>               
    </fieldset> 
  </form>    
</div> <!--Container  -->
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
      $("#po_id").select2({
            placeholder: "Perkančioji organizacija",          
            allowClear: true
        });
    });
</script>

@endsection