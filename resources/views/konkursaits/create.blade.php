@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-6"><h4>Naujas TS projektas</h4></div>
    <div class="col-xs-6 text-right">
      @if(auth()->check())
        <a href="/paskelbtits"><button class="btn btn-sm btn-primary right">Grįžti neišsaugant</button></a>
      @endif
    </div>  
  </div>

  <form action="/paskelbtits" class="form" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <fieldset>      
      <div class="row">
        <div class="col-md-4 col-xs-6">
         Paskelbimo data:
          <div class="form-group">
            <input type="date" class="form-control date" name="paskelb_data" value="{{old('paskelb_data')}}">  
              @if ($errors->has('paskelb_data'))
              <div style="color:red;">{{$errors->first('paskelb_data')}}</div>
              @endif              
          </div>
        </div>
        <div class="col-md-2 col-xs-6">
          Numeris:
          <div class="form-group">
            <input type="number" class="form-control" name="numeris" placeholder="Numeris" value="{{old('numeris')}}">  
             @if ($errors->has('numeris'))
                <div style="color:red;">{{$errors->first('numeris')}}</div>
             @endif 
          </div>
        </div>
        <div class="col-md-4 col-xs-6">
          Galiojimo data:
          <div class="form-group">
            <input type="date" class="form-control date" name="galiojimo_data" value="{{old('galiojimo_data')}}">
              @if ($errors->has('galiojimo_data'))
                <div style="color:red;">{{$errors->first('galiojimo_data')}}</div>
              @endif 
          </div>
        </div>
        <div class="col-md-2 col-sm-6">
          Valanda:
          <div class="form-group">
            <input type="text" class="form-control" name="valanda" placeholder="--:--" value="{{old('valanda')}}">
              @if ($errors->has('valanda'))
                <div style="color:red;">{{$errors->first('valanda')}}</div>
              @endif 
          </div>
        </div>  
      </div>

      <div class="row">
        <div class="col-md-12 col-xs-12">
          Pavadinimas:
          <div class="form-group">
            <input type="text" class="form-control" name="pavadinimas" placeholder="Pavadinimas" value="{{old('pavadinimas')}}">
            @if ($errors->has('pavadinimas'))
              <div style="color:red;">{{$errors->first('pavadinimas')}}</div>
            @endif 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          Nuoroda:
          <div class="form-group">
            <input type="text" class="form-control" name="nuoroda" placeholder="http://" value="{{old('nuoroda')}}">
              @if ($errors->has('nuoroda'))
                <div style="color:red;">{{$errors->first('nuoroda')}}</div>
              @endif 
          </div>
        </div>
      </div>          
      <div class="row">
        <div class="col-xs-6">
          Perkančioji organizacija:
          <div class="form-group">
            <select class="form-control" name="po_id" id="po_id">
              <option value="{{old('po_id')}}">Perkančioji organizacija</option>
              @foreach ($pos as $po)
                <option value="{{ $po['id'] }}">{{ $po['pavadinimas'] }}</option>
              @endforeach
            </select>
            @if ($errors->has('po_id'))
              <div style="color:red;">{{$errors->first('po_id')}}</div>
            @endif 
         </div>
        </div> 
        <div class="col-md-6">
          Pastabos:
          <div class="form-group">
            <input type="text" class="form-control" name="pastabos" placeholder="Pastabos" value="{{old('pastabos')}}">
          </div>
        </div>         
      </div>
      <div class="row">            
        <!-- <div class="col-md-4 col-sm-6">
          <input type="file" name="file[]" multiple>
        </div> -->
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
            placeholder: "Perkančioji organizacija",
            allowClear: true

        });
    });
</script>

@endsection