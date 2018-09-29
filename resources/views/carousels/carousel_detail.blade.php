@if($carousel->id === 1)
<div class="carousel-item active">
@else
<div class="carousel-item">
@endif  
    <img src="img/carousel/{{$carousel->image}}" alt="{{$carousel->name}}" style="width: 100%;
    max-height: 530px; object-fit: cover;">
        <div class="carousel-caption d-none d-md-block">
                <h1>{{$carousel->name}}</h1>
                <p>{{$carousel->description}}</p>     
            <p> 
                <a class="btn btn-lg btn-primary" href="{{$carousel->link}}" role="button">{{$carousel->button}}</a>
            </p>    

        @if(session('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{session('message')}}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Auth::check() && (Auth::user()->admin === 1))
        {{Form::model($carousel,array('files'=>TRUE, 'route'=>'updateCarousel'))}}
        {{Form::hidden('id',null,['class'=>'form-control','value'=>"$carousel->id"])}}
        {{Form::text('name',null,['class'=>'form-control'])}}
        {{Form::textarea('description',null,['class'=>'form-control'])}}
        <div class="row">
            <div class="col-sm">
                {{Form::text('link',null,['class'=>'form-control'])}}    
            </div>    
            <div class="col-sm">
            {{Form::text('button',null,['class'=>'form-control'])}}
            </div>
        </div>
        {{-- max_width=930,max_height=530 --}}
        {{Form::label('Image Max Width 930px, Max Height 530px',null,['class'=>'form-control'])}}
        {{Form::file('image',['class'=>'btn btn-lg btn-primary','style'=>'background-color: transparent;'])}}
        {{Form::submit('Save',['class'=>'btn btn-lg btn-primary pull-right','style'=>'background-color: transparent;'])}}
        {{Form::close() }}
        @endif  
    </div>
</div>
    


    



