@extends('layouts.layout')
@section('title') Partners @endsection @section('content')
<div class="container">
    @if (Auth::check()&&Auth::user()->admin === 1)
        <div class="mr-auto">
            <a class="btn" href="/partners/create">Add Partner</a>
        </div>
    @endif

    <div class="container">
        @if (count($partners)>0)
            @foreach ($partners as  $partner)
                @if ( ($loop->index %4) === 0)
                    <div class="card-group">
                @endif
                {{-- <div class="card hoverable">
                        <div class="card-image">
                            <img src="http://via.placeholder.com/460x230">
                            <span class="card-title">{{$post->title}}</span>
                            <a class="btn-floating halfway-fab waves-effect waves-light red hover"><i
                                        class="material-icons">remove_red_eye</i></a>
                        </div>
                        <div class="card-content">
                            <p>
                                Created by {{$post->user->name}}<br>
                                <small>on {{$post->created_at->toDateString()}}
                                    at {{$post->created_at->toTimeString()}}</small>
                            </p>
                        </div>
                    </div> --}}
                    @include ('partners.partner_detail')
                @if ( ($loop->index+1) %4 === 0)
                    </div>
                @endif
            @endforeach
        @endif      
    </div>
@endsection
