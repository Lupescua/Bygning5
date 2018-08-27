@extends('layouts.layout')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

 @section('title') Book a Room @endsection @section('content')
<div class="container">
    <!-- If is Admin -->
    @if (Auth::check())
        @if (Auth::user()->admin === 1)
        <div class="mr-auto">
            <a class="btn" href="/rooms/create">Add Room</a>
        </div>
        @endif
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Rooms Calendar</div>
                    <div class="panel-body">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @foreach ($rooms as $room) @include ('rooms.room_detail') @endforeach

</div>
@endsection 

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!} @endsection
