@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6"><h4>Nauja sutartis</h4></div>
    <div class="col-md-6 text-right"> <a href="{{URL::previous()}}"><input class="btn btn-primary"value="Grįžti neišsaugant"></a></div>
  </div>
  <form action="/sutartys" class="form" method="post">
    {{ csrf_field() }}
    <fieldset>
      <div class="row">
        <div class="col-md-4">
          Sutarties numeris:
            <div class="form-group">
              <input type="text" class="form-control" name="numeris" placeholder="Sutarties numeris" value="{{old('numeris')}}">
                 @if ($errors->has('numeris'))
                  <div style="color:red;">{{$errors->first('numeris')}}</div>
                @endif
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          Pavadinimas:
            <div class="form-group">
              <input type="text" class="form-control" name="pavadinimas" placeholder="Sutarties pavadinimas" value="{{old('pavadinimas')}}">
                 @if ($errors->has('pavadinimas'))
                  <div style="color:red;">{{$errors->first('pavadinimas')}}</div>
                @endif
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-xs-6">
          Sutarties data:
          <div class="form-group">
            <input type="date" class="form-control" name="sutarties_data" value="{{old('sutarties_data')}}">
            @if ($errors->has('sutarties_data'))
                  <div style="color:red;">{{$errors->first('sutarties_data')}}</div>
            @endif
          </div>
        </div>
        <div class="col-md-4 col-xs-6">
          Sutartis galioja:
          <div class="form-group">
            <input type="date" class="form-control" name="sutartis_galioja" value="{{old('sutartis_galioja')}}">
            @if ($errors->has('sutartis_galioja'))
                  <div style="color:red;">{{$errors->first('sutartis_galioja')}}</div>
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-xs-6">
          Sutarties suma:
          <div class="form-group">
            <input type="number" step="0.01"  class="form-control" name="sutarties_suma" placeholder="Sutarties suma" value="{{old('sutarties_suma')}}">
            @if ($errors->has('sutarties_suma'))
                  <div style="color:red;">{{$errors->first('sutarties_suma')}}</div>
            @endif
          </div>
        </div>
        <div class="col-md-8 col-xs-6">
          Pastabos:
          <div class="form-group">
            <input type="text" class="form-control" name="pastabos" value="{{old('pastabos')}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
             Perkančioji organizacija:
            <div class="form-group">
              <select class="form-control" name="po_id" id="po_id">
                
                 @foreach ($pos as $po)
                 <option value="{{old('po_id')}}"></option>
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
            <input class="btn btn-primary" type="submit" value="Saugoti">             
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
            placeholder: "Organizacijos pavadinimas",
            allowClear: true
        });
    });
</script>
@endsection