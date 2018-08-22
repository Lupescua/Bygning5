@extends('layouts.layout') @section('title') Add a new Room @endsection @section('content')
<form method="post" action="/rooms/{{$room->id}}/update" enctype="multipart/form-data">
   {{csrf_field()}}
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="name">Room Title</label>
                <input name="name" type="text" class="form-control" id="name" value="{{$room->name}}">
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="description">Room Description</label>
                <textarea name="description" type="text" class="form-control" id="description" value="{{$room->description}}">
                    {{$room->description}}
                </textarea>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="adress">Building Adress</label>
                <input name="adress" type="text" class="form-control" id="adress" placeholder="Nicolai Bygning 5" value="{{$room->adress}}">
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="floor_nr">Floor Number</label>
                <input name="floor_nr" type="text" class="form-control" id="floor_nr" placeholder="Floor Number" value="{{$room->floor_nr}}">
            </div>
        </div>

        <div class="col-md-8 mb-3">
            <div class="form-group row">
                <div class="col-md-5 order-md-1">
                    @if(count($room->image) > 0)
                    <img class="featurette-image img-fluid mx-auto" src="/img/rooms/{{$room->image}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image"> @else
                    <img class="featurette-image img-fluid mx-auto" src="http://designsontap.co/wp-content/uploads/2018/07/teenage-guy-bedroom-ideas-beautiful-best-cool-room-decorating-ideas-for-guys-e280a2-the-ignite-show-of-teenage-guy-bedroom-ideas.jpg"
                        data-src="holder.js/500x500/auto" alt="Generic placeholder image">
                         @endif
                </div>
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Room Image') }}</label>
                <div class="col-md-6">
                    <input id="image" type="file" name="image" value="{{ old('image') }}" d> @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <div class='input-group date' id='bookable_room'>
                    <input name="bookable" type='checkbox' id="bookable" value="{{$room->bookable}}">
                    <label for="bookable">Admin only - Bookable</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <!-- This action will route to the controller -->
            <button class="btn btn-primary offset-sm-7" type="submit">Update</button>
        </div>
    </div>
    @include ('layouts.errors')
</form>
@endsection
