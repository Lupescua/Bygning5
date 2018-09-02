@extends('layouts.layout')
@section('title')
All Events
@endsection

@section('content')
<div class="container">

@if (count(events)>0)
@foreach ($events as $event)
    @include ('events.event_detail')
@endforeach
@endif
</div>
@endsection