<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css" />
    <!-- FullCalendar -->
    <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/fullcalendar.min.css"/>
    <link rel="stylesheet" href="css/fullcalendar.print.css" media="print"/>      -->   
    <!-- // <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->    
    <title>{{ config('app.name', 'VPK') }}</title>
    <!-- Styles -->   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">   
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        VPK
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="{{ url()->current() === url('/paskelbtik')? 'active' : ''}}"><a href="/paskelbtik">Paskelbti konkursai</a></li>
                            <li class="{{ url()->current() === url('/paskelbtits')? 'active' : ''}}"><a href="/paskelbtits">Konkursu TS</a></li>
                            <li class="{{ url()->current() === url('/suvestine')? 'active' : ''}}"><a href="/suvestine">Konkursų Suvestinė</a></li>                          
                            <li class="{{ url()->current() === url('login')? 'active' : ''}}"><a href="{{ route('login') }}">Prisijungti</a></li>
                            <li class="{{ url()->current() === url('register')? 'active' : ''}}"><a href="{{ route('register') }}">Registruotis</a></li>
                        @else    
                            <li class="{{ url()->current() === url('/paskelbtik')? 'active' : ''}}"><a href="{{ route('paskelbtik.index') }}">Paskelbti konkursai</a></li> 
                            <li class="{{ url()->current() === url('/paskelbtits')? 'active' : ''}}"><a href="{{ route('paskelbtits.index') }}">Konkursų TS</a></li>  
                            <li class="{{ url()->current() === url('/suvestine')? 'active' : ''}}"><a href="{{ route('suvestine.index') }}">Konkursų Suvestinė</a></li>                      
                            <li class="{{ url()->current() === url('po')? 'active' : ''}}"><a href="{{ route('po.index') }}">Organizacijos</a></li>
                            <li class="{{ url()->current() === url('sutartys')? 'active' : ''}}"><a href="{{ route('sutartys.index') }}">Sutartys</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Atsijungti
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    
                                    <!-- <li><a href="{{ route('kalendorius') }}">Kalendorius</a></li> -->
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
<!--  <script src="js/moment.min.js"></script>
    <script src="js/fullcalendar.js"></script>
    <script src="js/jquery.min.js"></script> -->
   
    <!-- // <script src="js/app.js"></script> -->
    <!-- Select2 search field of Perkancioji organizacija  -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    
    @yield('script')
   
      <script>
         jQuery(document).ready(function() {
            @yield('checkboxJquery')
        });
     </script>  
    
</body>
</html>
