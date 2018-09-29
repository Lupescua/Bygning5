
<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, <a href="/events/{{$event->id}}">{{$event->name}}</a> is that good.
            <span class="text-muted">See for yourself.</span>
        </h2>
        <p class="lead"> You can find it {{$event->adress}} at the {{$event->floor_nr}} floor </p>  
        @if ($event->link === "null")
        <a >There is no link to event</a>
        @else
        <a href="{{$event->link}}">Link to event</a>
        @endif
        <p class="lead"> {{$event->user->name}} made {{$event->name}} <br/>
           Description:  {{$event->desription}}
        </p>
            <table>
                <td>
                    <div class="col-md-6 ">
                        <p>Event start:</p>
                        <p>Event end:</p> 
                    </div>
                </td>                
                <td>
                    <div class="col-md-9">
                        <p>{{$event->start_date}}</p>
                        <p>{{$event->end_date}}</p>
                    </div>
                </td>
                <td>
                    <div class="col-md-6">
                        <p>Event room: </p>
                        <p>Adress: </p>
                    </div>
                </td>
                <td>
                    <div class="col-md-6">
                        <p>{{$event->name}}</p>
                        <p>{{$event->adress}}</p>
                    </div>
                </td>
            </table>
        @if (Auth::check())
            @if (Auth::user()->id === $event->user->id or Auth::user()->admin === 1)
                    
            <form action="/events/{{$event->id}}" method="post">    
                {!! method_field('delete') !!}        
                {!! csrf_field() !!}
                <input name="id" type="hidden" value="{{$event->id}}">
                <button>Delete event</button>              
            </form> 
            @endif 
        @endif
    </div>
    <div class="col-md-5 order-md-1">     
            <img class="img-thumbnail" src="/img/events/{{$event->image}}"  alt="Generic placeholder image"> 
  </div>
</div>