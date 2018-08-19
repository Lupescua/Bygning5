@extends('layouts.layout')
@section('title')
Book a Room
@endsection

@section('content')
<div class="container">
<!-- If is Admin -->
<div class="mr-auto">
<a class="btn" href="/rooms/create">Add Room</a>
</div>

@foreach ($rooms as $room)
    @include ('rooms.room_detail')

@endforeach
</div>
@endsection