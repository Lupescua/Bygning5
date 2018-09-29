@extends('layouts.layout')
@section('title') Partners @endsection @section('content')
{{Form::open(array('files'=>TRUE, 'action'=>'PartnersController@store'))}}
{{Form::label('Partner Name',null,['class'=>'col-form-label','for'=>"name"])}}
{{Form::text('name',null,['class'=>'form-control'])}}
{{Form::label('Partner description',null,['class'=>'col-form-label','for'=>"description"])}}
{{Form::textarea('description',null,['class'=>'form-control'])}}
{{Form::label('Link',null,['class'=>'col-form-label','for'=>"link"])}}
{{Form::text('link',null,['class'=>'form-control'])}} 
{{Form::label('Image Max Width 930px, Max Height 530px',null,['class'=>'form-control'])}}
{{Form::file('image',['class'=>'btn btn-lg btn-primary'])}}
{{Form::submit('Save',['class'=>'btn btn-lg btn-primary pull-right'])}}
{{Form::close()}}
@endsection
