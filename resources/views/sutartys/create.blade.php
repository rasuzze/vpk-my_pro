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
            <input type="date" class="form-control" name="sutarties_data">
          </div>
        </div>
        <div class="col-md-4 col-xs-6">
          Sutartis galioja:
          <div class="form-group">
            <input type="date" class="form-control" name="sutartis_galioja">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-xs-6">
          Sutarties suma:
          <div class="form-group">
            <input type="number" step="0.01"  class="form-control" name="sutarties_suma" placeholder="Sutarties suma">
          </div>
        </div>
        <div class="col-md-8 col-xs-6">
          Pastabos:
          <div class="form-group">
            <input type="text" class="form-control" name="pastabos">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
             Konkursas:
            <div class="form-group">
              <select class="form-control" name="paskelbtas_konkursas_id" id="paskelbtas_konkursas_id">
                <option value="{{old('paskelbtas_konkursas_id')}}"></option>
                 @foreach ($konkursai as $konkursas)
                <option value="{{ $konkursas['id'] }}">{{ $konkursas['pavadinimas'] }}</option>
                  @endforeach
              </select>
                @if ($errors->has('paskelbtas_konkursas_id'))
              <div style="color:red;">{{$errors->first('paskelbtas_konkursas_id')}}</div>
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
      $("#paskelbtas_konkursas_id").select2({
            placeholder: "Konkurso pavadinimas",
            allowClear: true
        });
    });
</script>
@endsection