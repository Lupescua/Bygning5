@extends('layouts.layout')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('title')
Show Room
@endsection

@section('content')
    @include ('rooms.room_detail')

    @if (isset($bookings))
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Rooms Calendar</div>
                    <div class="panel-body">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

<h1> Events in {{$room->name}}</h1>
    @if (isset($bookings))
        @foreach ($bookings as $booking)
            @include ('bookings.booking_detail')
        @endforeach
    @else
        <h1>There are no events in this room. Yet!</h1>
    @endif

@endsection



@if (isset($calendar))
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
        {!! $calendar->script() !!} 
    @endsection
@else
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    @endsection
@endif

