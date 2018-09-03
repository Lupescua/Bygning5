@extends('layouts.layout') @section('title') Add a new Room @endsection @section('content')
<form method="post" action="/rooms" enctype="multipart/form-data">
    <!-- {{ action('RoomsController@create') }} -->
    {{csrf_field()}}
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="name">Room Title</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Room Name" require>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="description">Room Description</label>
                <textarea name="description" type="text" class="form-control" id="description" placeholder="Room Description"></textarea>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="adress">Building Adress</label>
                <input name="adress" type="text" class="form-control" id="adress" placeholder="Nicolai Bygning 5" value="Nicolai Bygning 5">
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="floor_nr">Floor Number</label>
                <input name="floor_nr" type="text" class="form-control" id="floor_nr" placeholder="Floor Number">
            </div>
        </div>

        <div class="col-md-8 mb-3">
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Room Image') }}</label>
                <div class="col-md-6">
                    <input id="image" type="file" name="image" value="{{ old('image') }}" required>
                    @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
       
        <div class="col-md-8 mb-3">
            <div class="form-group row">
                <div class='input-group' id='bookable_room'>
                    @if (Auth::check())    
                        @if (Auth::user()->admin === 1)
                            <label for="bookable">Bookable</label>
                            <input name="bookable" type='checkbox' id="bookable">
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <!-- This action will route to the controller -->
            <button class="btn btn-primary offset-sm-7" type="submit">Add</button>
        </div>
    </div>
    @include ('layouts.errors')
</form>
@endsection
