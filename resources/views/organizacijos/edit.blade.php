@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-6"><h4>Perkančioji organizacija</h4><p>Atnaujinti duomenis</p></div>
    <div class="col-xs-6 text-right">    
        <a href="/po"><button class="btn btn-sm btn-primary right">Grįžti neišsaugant</button></a>    
    </div> 
  </div>
  <form action="/po/{{$organizacija->id}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="patch">
    <fieldset>
      <div class="row">
        <div class="col-md-8">
          Pavadinimas:
            <div class="form-group">
              <input type="text" class="form-control" name="pavadinimas" value="{{$organizacija->pavadinimas}}">
                 @if ($errors->has('pavadinimas'))
                  <div style="color:red;">{{$errors->first('pavadinimas')}}</div>
                @endif
            </div>
        </div>
        <div class="col-md-4 col-xs-6">
          Kodas:
          <div class="form-group">
            <input type="number" class="form-control" name="kodas" value="{{$organizacija->kodas}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          Adresas:
          <div class="form-group">
            <input type="text" class="form-control" name="adresas" value="{{$organizacija->adresas}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-xs-12">
          Email:
          <div class="form-group">
            <input type="email" class="form-control" name="email" value="{{$organizacija->email}}">
          </div>
        </div>
        <div class="col-md-4 col-xs-6">
          Telefonas:
          <div class="form-group">
            <input type="number" class="form-control" name="tel" value="{{$organizacija->tel}}">
          </div>
        </div>
      </div>     

       <div class="form-group">
         <div class="col-md-12 text-right">
          <input class="btn btn-primary" type="submit" value="Atnaujinti duomenis">
            
              <a href="/po"><input class="btn btn-primary"value="Grįžti neišsaugant"></a>
          </div>      
      </div>
                
    </fieldset> 
  </form>    
</div> <!--Container  -->

@endsection