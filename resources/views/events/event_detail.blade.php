
<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, <a href="/events/{{$event->id}}">{{$event->name}}</a> is that good.
            <span class="text-muted">See for yourself.</span>
        </h2>
        <p class="lead"> You can find it {{$event->adress}} at the {{$event->floor_nr}} floor </p>
        @if ($event->bookable === 0)
        <p class="lead"> The event is currently booked </p>
        @elseif ($event->bookable === 1)
        <p class="lead"> The event is currently bookable </p>
        @endif              
        <p class="lead"> {{$event->name}} Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.
            Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
            commodo.
        </p>
        @if ($event->bookable === 1)
        <button> Book </button>
        @endif 
    </div>
    <div class="col-md-5 order-md-1">     
            <img class="featurette-image img-fluid mx-auto" src="/img/events/{{$event->image}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image"> 
  </div>
</div>