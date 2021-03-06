@extends('layouts.layout')
@section('title') All users @endsection @section('content')
<div class="container">
    <!-- If is Admin -->
    @if (Auth::check())
        @if (Auth::user()->admin === 1)
            @foreach ($users as $user)
                @include ('users.simple_profile')
            @endforeach
        @elseif (Auth::user()->admin === 0)
        <h1>Sorry you are not an Admin user</h1>
        @endif
    @endif
@endsection

