@extends('layouts.app')

<!-- @section('content')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css"/>



<div class="container">

    <div class="panel panel-primary">

        <div class="panel-heading">

          <h1> Calendar </h1>
{!! $calendar->calendar() !!}
{!! $calendar->script() !!}
           

        </div>

    </div>

</div>
@endsection -->
<!-- @section('script')
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($konkursai as $konkursas)
                {
                    title : '{{ $konkursas->pavadinimas }}',
                    start : '{{ $konkursas->konkurso_data }}',
                    url : '{{ route('paskelbtik.edit', $konkursas->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>
@endsection -->