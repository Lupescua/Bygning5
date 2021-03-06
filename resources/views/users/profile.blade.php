@extends('layouts.layout') @section('title') {{$user->name}} @endsection @section('content')
<hr class="featurette-divider">

<div>
    <form class="row featurette" enctype="multipart/form-data" action="/profile/{{$user->id}}" method="POST">
        {{ method_field('PUT') }}
        {{csrf_field()}}
        <div class="col-md-7 order-md-1">
            <img src="/img/user/{{$user->image}}" alt="{{$user->name}}" style='width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;'>
            <h1><input name="name" type="text" placeholder="{{$user->name}}" value="{{$user->name}}"></h1>
                 
            <input name="email" class="lead" type="email" placeholder="{{$user->email}}" value="{{$user->email}}">
        </div>

        <div class="col-md-7 order-md-2">
            <div class="col-md-10 col-md-offset-1">
                <label>Change Profile Image</label>
                <input type="file" name="image">
            </div>
            <!-- <div class="ml-auto"> -->
            <div class="col-md-10">
                <div class="pull-right">
                    <button type="submit" class="btn btn-sm btn-primary" id="update">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container">

    @foreach ($events as $event) @include ('events.event_detail') @endforeach

</div>
@endsection
