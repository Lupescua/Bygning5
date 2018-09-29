@extends('layouts.layout')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

 @section('title') Book a Room @endsection @section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default ">
                <div class="panel-heading">Rooms Calendar</div>
                <div class="media">
                    <div class="panel-body">
                        {!! $calendar->calendar() !!}
                    </div>
                    @if (Auth::check())
                        @if(Auth::user()->admin === 1)
                        <div class="ml-3 align-self-start ">
                            <a class="btn btn-primary" href="/rooms/create">Add Room</a>
                        </div>
                        @endif
                    @endif
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
