@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-6"><h4>Atnaujinti duomenis</h4></div>
    <div class="col-xs-6 text-right">    
        <a href="/sutartys"><button class="btn btn-sm btn-primary right">Grįžti neišsaugant</button></a>    
    </div>    
  </div>
  <form action="/sutartys/{{$sutartis->id}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="patch">
    <fieldset>
      <div class="row">
        <div class="col-md-4 col-xs-6">
          Sutarties numeris:
          <div class="form-group">
            <input type="text" class="form-control" name="numeris" value="{{ $sutartis->numeris }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          Pavadinimas:
            <div class="form-group">
              <input type="text" class="form-control" name="pavadinimas" value="{{ $sutartis->pavadinimas }}">                
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-xs-6">
          Sutarties data:
          <div class="form-group">
            <input type="date" class="form-control" name="sutarties_data" value="{{ $sutartis->sutarties_data }}">
          </div>
        </div>
        <div class="col-md-4 col-xs-6">
          Sutartis galioja:
          <div class="form-group">
            <input type="date" class="form-control" name="sutartis_galioja" value="{{ $sutartis->sutartis_galioja }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-xs-6">
          Sutarties suma:
          <div class="form-group">
            <input type="number" step="0.01"  class="form-control" name="sutarties_suma" value="{{ $sutartis->sutarties_suma }}">
          </div>
        </div>
        <div class="col-md-8 col-xs-6">
          Pastabos:
          <div class="form-group">
            <input type="text" class="form-control" name="pastabos" value="{{ $sutartis->pastabos }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
             Perkančioji organizacija:
            <div class="form-group">
              <select class="form-control" name="po_id" id="po_id">                   
              @foreach ($pos as $po)
                <option value="{{ $po['id'] }}">{{ $po['pavadinimas'] }}</option>
              @endforeach
              </select>
                @if ($errors->has('po_id'))
              <div style="color:red;">{{$errors->first('po_id')}}</div>
                @endif 
            </div>
        </div>           
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