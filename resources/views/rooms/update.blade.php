@extends('layouts.layout') 
@section('title') Add a new Room @endsection 
@section('content')
{{Form::model($room,array('files'=>TRUE, 'route'=>array("room.update",$room->id)))}}
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {{Form::label('Room Title',null,['for'=>"name"])}}
                {{Form::text('name',null,['class'=>'form-control'])}}
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {{Form::label('Room Description',null,['for'=>"description"])}}
                {{Form::textarea('description',null,['class'=>'form-control'])}}
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {{Form::label('Building Adress',null,['for'=>"adress"])}}
                {{Form::text('adress',null,['class'=>'form-control','placeholder'=>"Nicolai Bygning 5" ])}}
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {{Form::label('Floor Number',null,['for'=>"floor_nr"])}}
                {{Form::text('floor_nr',null,['class'=>'form-control','placeholder'=>"Floor Number" ])}}
            </div>
        </div>

        <div class="col-md-8 mb-3">
            <div class="form-group row">
                <div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" src="/img/rooms/{{$room->image}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image"> 
                </div>
                {{Form::label('Upload Room Image',null,['class'=>'col-md-4 col-form-label text-md-right','for'=>"image"])}}
                <div class="col-md-6">
                    {{Form::file('image',['placeholder'=>"$room->image"])}}
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <div class='input-group date' id='bookable_room'>
                    @if (Auth::check())    
                        @if (Auth::user()->admin === 1)
                        <label for="bookable">Can the room be booked?</label>
                            @if ($room->bookable === 1)
                                <input checked="checked" name="bookable" type="checkbox" value="1">
                            @else
                                <input name="bookable" type="checkbox" value="1">
                            <p></br>The room currently Can Not be Booked</p>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
                {{Form::submit('Update',['class'=>'btn offset-sm-7'])}}
        </div>
    </div>
    @include ('layouts.errors')
{{Form::close() }}
@endsection
