@extends('layouts.layout')
@section('title')
Show blade
@endsection

@section('content')
<div class="row featurette">
    <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, <a href="/rooms/{{$room->id}}">{{$room->name}}</a> is that good.
            <span class="text-muted">See for yourself.</span>
        </h2>
        <p class="lead"> You can find it {{$room->adress}} at the {{$room->floor_nr}} floor </p>
        @if ($room->bookable === 0)
        <p class="lead"> The room is currently booked </p>
        @elseif ($room->bookable === 1)
        <p class="lead"> The room is currently bookable </p>
        @endif              
        <p class="lead"> {{$room->name}} Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.
            Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
            commodo.
        </p>
        @if ($room->bookable === 1)
        <div>        
        <button class="order-md-1"> Book </button>
        <button class="order-md-2"> Update </button>
        <button class="order-md-3"> Delete </button>
        </div>
        @endif 
    </div>
    <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" src="http://designsontap.co/wp-content/uploads/2018/07/teenage-guy-bedroom-ideas-beautiful-best-cool-room-decorating-ideas-for-guys-e280a2-the-ignite-show-of-teenage-guy-bedroom-ideas.jpg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
    </div>
</div>
@endsection