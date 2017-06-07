@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-6"><h4>Atnaujinti duomenis</h4></div>
    <div class="col-xs-6 text-right">    
        <a href="/suvestine"><button class="btn btn-sm btn-primary right">Grįžti neišsaugant</button></a>    
    </div>    
  </div>
  <!-- Edit Form -->
  <form action="/suvestine/{{$konkursas->id}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="patch">
    <fieldset>
      <div class="row">
        <div class="col-md-12">
          <h2>Pavadinimas: {{ $konkursas->pavadinimas }}</h2>          
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
            Vieta:
          <div class="form-group">
            <input type="text" class="form-control" name="vieta" value="{{ $konkursas->vieta }}">
          </div>
        </div>
        <div class="col-md-2">
            Mažiausia kaina:
          <div class="form-group">
            <input type="number" step="0.01" class="form-control" name="maz_kaina" value="{{ $konkursas->maz_kaina }}">
          </div>
        </div>
      </div>          

      <div class="row">
        <div class="col-md-6">
          Laimėtojas:
          <div class="form-group">
              <select class="form-control" name="laimetojas" id="po_id">                   
                @foreach ($pos as $po)
                  <option value="{{ $po['pavadinimas'] }}">{{ $po['pavadinimas'] }}</option>
                @endforeach
              </select>
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