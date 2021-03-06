@extends('layouts.layout') @section('title') Add a new Event @endsection @section('content')

<form method="post" action="/events" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="name">Event Title</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Event Name" required>
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
                <label for="adress">Adress</label>
                <input name="adress" type="text" class="form-control" id="adress" placeholder="Event adress" required>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {!! Form::label('startDate','Start Date:') !!}
                <div>
                    <input name="start_date" type="dateTime-local" class="form-control" id="startDate" value="20{{Carbon\Carbon::tomorrow()->format('y-m-d\TH:i')}}">
                    {!! $errors->first('start_date','
                    <p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                {!! Form::label('end_date','End Date:') !!}
                <div>
                    <input name="end_date" type="dateTime-local" class="form-control" id="endDate" value="20{{Carbon\Carbon::tomorrow()->format('y-m-d\TH:i')}}">
                    {!! $errors->first('end_date','<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="link">Event Link: <br/>
                    Example: "https://www.somewhere.com"
                </label>
                <input name="link" type="link" class="form-control" id="link" placeholder="Event link" required>
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
    <div class="form-group">
        <div class="row">
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
