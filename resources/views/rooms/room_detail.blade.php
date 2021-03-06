<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah,
            <a href="/rooms/{{$room->id}}">{{$room->name}}</a> is that good.
            <span class="text-muted">See for yourself.</span>
        </h2>
        <p class="lead"> You can find it at {{$room->adress}} on the {{$room->floor_nr}} floor </p>
        @if ($room->bookable === 0)
        <p class="lead"> The room currently <strong>Can Not Be</strong> Booked</p>
        @elseif ($room->bookable === 1)
        <p class="lead"> The room currently <strong>Can Be</strong> Booked </p>
        @endif
        <p class="lead"> {{$room->name}} Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.
            Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.
        </p>
        <div>
            @if (Auth::check())
                @if ($room->bookable === 1)
                    <a class="btn order-md-1" href="/rooms/{{$room->id}}/book"> Book </a>   
                @endif      
                @if (Auth::user()->admin === 1)
                    <a class="btn order-md-2" href="/rooms/{{$room->id}}/update"> Update </a>
                    <a class="btn order-md-3" href="/rooms/{{$room->id}}/delete"> Delete </a>
                @endif
            @endif
        </div>
    </div>
    <div class="col-md-5 order-md-1">
        @if(count($room->image) > 0)
        <img class="featurette-image img-fluid mx-auto" src="/img/rooms/{{$room->image}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image"> @else
        <img class="featurette-image img-fluid mx-auto" src="http://designsontap.co/wp-content/uploads/2018/07/teenage-guy-bedroom-ideas-beautiful-best-cool-room-decorating-ideas-for-guys-e280a2-the-ignite-show-of-teenage-guy-bedroom-ideas.jpg"
            data-src="holder.js/500x500/auto" alt="Generic placeholder image"> @endif
    </div>
</div>
