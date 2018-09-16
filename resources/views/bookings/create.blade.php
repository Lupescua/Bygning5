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
                {!! Form::label('startDate','Start Date:') !!}
                <div>
                    <input name="startDate" type="dateTime-local" class="form-control" id="startDate" value="20{{Carbon\Carbon::now()->format('y-m-d\TH:i')}}">
                    {!! $errors->first('startDate','<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {!! Form::label('endDate','End Date:') !!}
                <div>
                    <input name="endDate" type="dateTime-local" class="form-control" id="endDate" value="20{{Carbon\Carbon::now()->format('y-m-d\TH:i')}}">
                    {!! $errors->first('end_date','<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="link">Event Link, if any</label>
                <input name="link" type="text" class="form-control" id="link" placeholder="Event link" required>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Event Image') }}</label>
                <div class="col-md-6">
                    <input id="image" type="file" name="image" value="{{ old('image') }}" required> @if ($errors->has('image'))
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
