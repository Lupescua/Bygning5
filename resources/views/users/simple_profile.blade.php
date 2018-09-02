<hr class="featurette-divider">

<div class="container col">

        <div class="col-md-7 order-md-1 row"> 
         <h1>{{$user->id}}</h1> 
            <img src="/img/user/{{$user->image}}" alt="{{$user->name}}" style='width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;'>           
        </div>
        
        <div class="col-md-7 order-md-2 row">  
            <div class="row">
                <p><a href="/profile/{{$user->id}}">{{$user->name}} </a></p>                 
                <br>
                <p> {{$user->email}}</p>   
            </div>            
           
        </div>
        <div>
        @if (Auth::user()->admin === 1)    
            <form action="/profile/{{$user->id}}" method="post">
                {!! method_field('delete') !!}
                {!! csrf_field() !!}
                <button>Delete</button>              
            </form>     
            <form action="/profile/{{$user->id}}" method="post">
                {!! method_field('update') !!}
                {!! csrf_field() !!}
                <input name="admin" type="hidden" value="1">
                <button>Make Admin</button>              
            </form>   
        @endif
        </div>
       
</div>