@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6"><h4>Perkančioji organizacija</h4></div>
    <div class="col-md-6 text-right"> <a href="{{URL::previous()}}"><input class="btn btn-primary"value="Grįžti neišsaugant"></a></div>
  </div>
  <form action="/po" class="form" method="post">
    {{ csrf_field() }}
    <fieldset>
      <div class="row">
        <div class="col-md-8">
          Pavadinimas:
            <div class="form-group">
              <input type="text" class="form-control" name="pavadinimas" placeholder="Organizacijos pavadinimas" value="{{old('pavadinimas')}}">
                 @if ($errors->has('pavadinimas'))
                  <div style="color:red;">{{$errors->first('pavadinimas')}}</div>
                @endif
            </div>
        </div>
        <div class="col-md-4 col-xs-6">
          Kodas:
          <div class="form-group">
            <input type="number" class="form-control" name="kodas">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          Adresas:
          <div class="form-group">
            <input type="text" class="form-control" name="adresas" placeholder="Adresas">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-xs-12">
          Email:
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="email">
          </div>
        </div>
        <div class="col-md-4 col-xs-6">
          Telefonas:
          <div class="form-group">
            <input type="number" class="form-control" name="tel">
          </div>
        </div>
      </div>     

       <div class="form-group">
         <div class="col-md-12 text-right">
            <input class="btn btn-primary" type="submit" value="Saugoti">             
          </div>      
      </div>
                
    </fieldset> 
  </form>    
</div> <!--Container  -->

@endsection