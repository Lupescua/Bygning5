@extends('layouts.layout') @section('title') Book this room @endsection @section('content')

{!! Form::open( array('files' => TRUE,'method' => 'post', 'url' => "/rooms/$room->id/book")) !!}
{{ Form::hidden('room_id', null,['value' => $room->id]) }}
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {{ Form::label('Event Title', null, ['class' => 'col-form-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control','required','placeholder'=>"Event Name"]) }}
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="description">Event Description</label>
                <textarea name="description" type="text" class="form-control" id="description" placeholder="Event Description" required></textarea>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {{ Form::label('Adress', null, ['class' => 'col-form-label','for'=>"adress"]) }}
                {{ Form::text('adress',null,['disabled'=>'disabled','class' => 'form-control','value'=>"$room->adress",'placeholder'=>"Room "."$room->name"." at the adress: "."$room->adress"]) }}
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {!! Form::label('start_date','Start Date:') !!}
                <div>
                    <input name="start_date" type="dateTime-local" class="form-control" value="20{{Carbon\Carbon::now()->format('y-m-d\TH:i')}}" required>
                    {!! $errors->first('start_date','<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {!! Form::label('end_date','End Date:') !!}
                <div>
                    <input name="end_date" type="dateTime-local" class="form-control" id="end_date" value="20{{Carbon\Carbon::now()->format('y-m-d\TH:i')}}" required>
                    {!! $errors->first('end_date','<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="url">Event Link, if any</label>
                <input name="link" type="url" class="form-control" placeholder="Event url" required>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Event Image') }}</label>
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

    </div>
</div>
    <div class="form-group">
        <div class="row">
            {{ Form::submit('Book', ['class' => 'btn btn-primary offset-sm-7']) }}
        </div>
    </div>
    @include ('layouts.errors')
    {{ Form::close() }}
@endsection
