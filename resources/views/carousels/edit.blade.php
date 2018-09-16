@extends('layouts.layout') @section('title') Add a new Carousel Picture @endsection @section('content')
<form method="post" action="/carousel/new" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-row">
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="name">Carousel Title</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Carousel Name" require>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="description">Carousel Description</label>
                <textarea name="description" type="text" class="form-control" id="description" placeholder="Carousel Description"></textarea>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="button">Button title</label>
                <input name="button" type="text" class="form-control" id="button" placeholder="Nicolai Bygning 5">
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group">
                <label for="link">Button link</label>
                <input name="link" type="text" class="form-control" id="link" placeholder="Floor Number">
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Carousel Image') }}</label>
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
            {{ Form::submit('Add', ['class' => 'btn btn-primary offset-sm-7']) }}
        </div>
    </div>
    @include ('layouts.errors')
</form>
@endsection
