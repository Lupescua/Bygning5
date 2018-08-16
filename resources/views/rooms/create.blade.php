@extends('layouts.layout')
@section('title')
Add a new Room
@endsection

@section('content')
<form method="post" action="/rooms">
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
                <label for="floor_nr">Floor Number</label>
                <input name="floor_nr" type="text"  class="form-control" id="floor_nr" placeholder="Floor Number">
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label>Select profile image:</label>
                <input type="file" name="main_pic_id" id="file" >
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <div class='input-group date' id='bookable_room'>
                    <input name="bookable" type='checkbox'  id="bookable" />
                    <label for="bookable">Admin only - Bookable</label>
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