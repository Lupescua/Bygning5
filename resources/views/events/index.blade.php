@extends('layouts.layout')
@section('title')
All Events
@endsection

@section('content')
<div class="container">

@foreach ($events as $event)
@include (events.event_detail)


@endforeach
</div>
@endsection