@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12"><h4>Naujas konkursas</h4></div>
  </div>
  <form action="/paskelbtik" class="form" method="post">
    {{ csrf_field() }}
    <fieldset>
      <div class="row">
            <div class="col-md-4 col-xs-6">
              Paskelbimo data:
              <div class="form-group">
                <input type="date" class="form-control date" name="paskelb_data">
                @if ($errors->has('paskelb_data'))
                  <div style="color:red;">{{$errors->first('paskelb_data')}}</div>
                @endif
              </div>
            </div>
            <div class="col-md-4 col-xs-6">
              Numeris:
              <div class="form-group">
                <input type="number" class="form-control" name="numeris" placeholder="Numeris">
                 @if ($errors->has('numeris'))
                  <div style="color:red;">{{$errors->first('numeris')}}</div>
                @endif
              </div>
            </div>
            <div class="col-md-4 col-xs-6">
              Konkurso data:
              <div class="form-group">
                <input type="date" class="form-control date" name="konkurso_data">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8 col-xs-12">
              Pavadinimas:
              <div class="form-group">
                <input type="text" class="form-control" name="pavadinimas" placeholder="Pavadinimas">
              </div>
            </div>
            <div class="col-md-4 col-xs-12">
              Nuoroda:
              <div class="form-group">
                <input type="text" class="form-control" name="nuoroda" placeholder="http://">
              </div>
            </div>
          </div>          

          <div class="row">
            <div class="col-xs-6">
              Perkančioji organizacija:
              <div class="form-group">
                <select class="form-control" name="po_id">
                    <option value="">Perkančioji organizacija</option>
                  @foreach ($pos as $po)
                    <option value="{{ $po['id'] }}">{{ $po['pavadinimas'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">            
            <div class="col-md-4 col-sm-6">
              Valanda:
              <div class="form-group">
                <input type="text" class="form-control" name="valanda" value="--:--">
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              Garantas:
              <div class="form-group">
                <select name="garantas" class="form-control">
                  <option value="">Garantas</option>
                  <option value="Tap">Taip</option>
                  <option value="Ne">Ne</option>
                </select>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              Pastabos:
              <div class="form-group">
                <input type="text" class="form-control" name="pastabos" placeholder="Pastabos">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12 text-right">
              <input class="btn btn-primary" type="submit" value="Saugoti">
              <!-- <a href="{{url('/paskelbtik')}}"><input class="btn btn-primary"value="Grįžti neišsaugant"></a> -->
            </div>
            <div>
            </div>
          </div>
                
        </fieldset> 
      </form>    
  </div> <!--Container  -->
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
@endsection