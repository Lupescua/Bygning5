@extends('layouts.layout')
@section('title')
{{$user->name}}
@endsection
@section('content')
<hr class="featurette-divider">

<div >
    <form class="row featurette" enctype="multipart/form-data" action="/profile/{user}" method="POST">
    {{csrf_field()}}
    <div class="col-md-7 order-md-1">
    <img src="/img/user/{{$user->image}}" alt="{{$user->name}}" style='width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;'>
        <h1 class="featurette-heading">Hi, {{$user->name}}</a> 
        </h1>
        
        <p class="lead"> Email : {{$user->email}} </p>
        <p class="lead"> Somehow I shuld show all the events I made  </p>                   

        @if ($user->admin === 1)
        <button> Ban </button>
        @endif 
    </div>
    
    <div class="col-md-7 order-md-2">
    <div class="col-md-10 col-md-offset-1">
                <label>Change Profile Image</label>
                <input type="file" name="image">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
    </div> </div>
            </form>
</div>
@endsection
