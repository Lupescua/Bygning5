@extends('layouts.layout') @section('title') {{$booking->name}}@endsection

@section('content')
<div class="container">

  @include ('bookings.booking_detail')

</div>
@endsection