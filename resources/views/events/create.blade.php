@extends('layouts.layout') @section('title') Add a new Event @endsection @section('content')

<form method="post" action="/events">
    <!-- {{ action('RoomsController@create') }} -->
    {{csrf_field()}}
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="name">Event Title</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Event Name" require>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="description">Event Description</label>
                <textarea name="description" type="text" class="form-control" id="description" placeholder="Event Description"></textarea>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="adress">Adress</label>
                <input name="adress" type="text" class="form-control" id="adress" placeholder="Event adress">
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {!! Form::label('start_date','Start Date:') !!}
                <div>
                    {!! Form::input('date','start_date',date('M-d-y'),['class'=>'form-control']) !!} {!! $errors->first('start_date','
                    <p class="alert alert-danger">:message</p>') !!}
                    {!! Form::input('time','start_time',null,['class'=>'form-control']) !!} {!! $errors->first('start_date','
                    <p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
            {!! Form::label('end_date','End Date:') !!}
                <div>
                    {!! Form::input('date','end_date',date('M-d-y'),['class'=>'form-control']) !!} {!! $errors->first('end_date','
                    <p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="link">Event Link, if any</label>
                <input name="link" type="text" class="form-control" id="link" placeholder="Event link">
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label>Select profile image:</label>
                <input type="file" name="main_pic_name" id="file">
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <div class='input-group date' id='bookable_room'>
                    <input name="bookable" type='checkbox' id="bookable" />
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
@endsection @section('script')
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });

</script>
@endsection
