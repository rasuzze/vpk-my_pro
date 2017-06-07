@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-6"><h4>Atnaujinti duomenis</h4></div>
    <div class="col-xs-6 text-right">    
        <a href="/paskelbtits"><button class="btn btn-sm btn-primary right">Grįžti neišsaugant</button></a>    
    </div>    
  </div>
  <form action="/paskelbtits/{{$konkursas->id}}" method="post" enctype="multipart/form-data">
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
        <div class="col-md-4 col-xs-6">
          Galiojimo data:
          <div class="form-group">
            <input type="date" class="form-control" name="galiojimo_data" value="{{ $konkursas->galiojimo_data }}">
          </div>
        </div>
        <div class="col-md-2 col-sm-6">
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
        <div class="col-xs-6">
          Perkančioji organizacija:
          <div class="form-group">
            <select class="form-control" name="po_id" id="po_id">                   
              @foreach ($pos as $po)
                <option value="{{ $po['id'] }}">{{ $po['pavadinimas'] }}</option>
              @endforeach
            </select>
          </div>
        </div> 
        <div class="col-md-6">
          Pastabos:
          <div class="form-group">
            <input type="text" class="form-control" name="pastabos" value="{{ $konkursas->pastabos }}">
          </div>
        </div>          
      </div>

      <div class="row">            
           
        <div class="form-group">
          <div class="col-md-12 text-right">
            <input class="btn btn-sm btn-primary" type="submit" value="Atnaujinti duomenis">              
          </div>
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