@extends('layouts.layout')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('title')
Calendar
@endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default ">
                <div class="panel-heading">Events Calendar</div>
                <div class="media">
                    <div class="panel-body">
                        {!! $calendar->calendar() !!}
                    </div>
                    @if (Auth::check())
                        <div class="ml-3 align-self-start ">
                            <a class="btn btn-primary" href="/events/create">Add Event</a>
                        </div>
                    @endif
                </div>
            </div>           
        </div>  
    </div>
</div>

<div class="container">
@foreach ($data as $event)
    @if(Carbon\Carbon::yesterday() <=  Carbon\Carbon ::parse($event->end_date))
        @include ('events.event_detail')
    @endif
@endforeach
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection