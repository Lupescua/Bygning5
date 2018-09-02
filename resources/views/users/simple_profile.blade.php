<hr class="featurette-divider">

<div class="container row">

        <!-- <div class="col-md-5 order-md-2 row"> 
            <img src="/img/user/{{$user->image}}" alt="{{$user->name}}" style='width:50px; height:50px; float:left; border-radius:50%; margin-right:25px;'>           
        </div> -->
        
        <div class="col-md-5 order-md-1 row">  
                     <h1>{{$user->id}}</h1> <img src="/img/user/{{$user->image}}" alt="{{$user->name}}" style='width:50px; height:50px; float:left; border-radius:50%; margin-right:25px;'>           

            <div class="col">
                <p><a href="/profile/{{$user->id}}">{{$user->name}}</a></p>        
                @if ($user->admin === 1)
                    <p>User is <strong>ADMIN</strong></p>
                @elseif ($user->admin === 0)
                    <p>User is not admin</p>
                @endif
                <p>{{$user->email}}</p>   
            </div>            
           
        </div>
        <div class="col-md-5 order-md-1">
        
        @if (Auth::user()->admin === 1)    
            <form action="/profile/{{$user->id}}" method="post">
                {!! method_field('delete') !!}
                {!! csrf_field() !!}
                <button>Delete</button>              
            </form>    
        @endif

        @if ($user->admin === 1)
            <form action="/profile/{{$user->id}}/update" method="post">            
                {!! csrf_field() !!}
                <input name="admin" type="hidden" value="0">
                <input name="user_id" type="hidden" value="{{$user->id}}">
                <button>Revoke Admin Rights</button>              
            </form> 
        @elseif ($user->admin === 0)
            <form action="/profile/{{$user->id}}/update" method="post">            
                {!! csrf_field() !!}
                <input name="admin" type="hidden" value="1">
                <input name="user_id" type="hidden" value="{{$user->id}}">
                <button>Make Admin</button>              
            </form> 
        @endif
        </div>
       
</div>