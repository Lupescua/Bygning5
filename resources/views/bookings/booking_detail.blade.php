
<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-7 order-md-2">
        <a name="{{$booking->id}}"></a>
        <h2 class="featurette-heading">Oh yeah, {{$booking->name}} is that good.
          <span class="text-muted">See for yourself.</span>
        </h2>
        <p class="lead"> You can find it {{$booking->adress}} at the {{$booking->floor_nr}} floor </p>
        @if ($booking->bookable === 0)
        <p class="lead"> The booking is currently booked </p>
        @elseif ($booking->bookable === 1)
        <p class="lead"> The booking is currently bookable </p>
        @endif              
        <p class="lead"> {{$booking->user->name}} made {{$booking->name}} Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.
            Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
            commodo.
        </p>
        @if (Auth::check())
            @if (Auth::user()->id === $booking->user->id or Auth::user()->admin === 1)
                    
            <form action="/bookings/{{$booking->id}}" method="post">    
                {!! method_field('delete') !!}        
                {!! csrf_field() !!}
                <input name="id" type="hidden" value="{{$booking->id}}">
                <button>Delete booking</button>              
            </form> 
            @endif 
        @endif

    </div>
    <div class="col-md-5 order-md-1">     
            <img class="featurette-image img-fluid mx-auto" src="/img/books/{{$booking->image}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image"> 
  </div>
</div>
