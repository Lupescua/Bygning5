@extends('layouts.layout')
@section('title')
All Carousels
@endsection

@section('content')
<div class="container">
    @if (count($carousels)>0)
        @foreach ($carousels as $carousel)
            @include ('carousels.carousel_detail')
        @endforeach
    @endif
</div>
@endsection