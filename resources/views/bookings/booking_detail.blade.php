
<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-7 order-md-2">
        <a name="{{$booking->id}}"></a>
        <h2 class="featurette-heading">{{$booking->name}}
        </h2>
        <p class="lead"> You can find it on the {{$booking->adress}} at the {{$booking->floor_nr}} floor </p>
        @if ($booking->bookable === 0)
        <p class="lead"> The booking is currently booked </p>
        @elseif ($booking->bookable === 1)
        <p class="lead"> The booking is currently bookable </p>
        @endif              
        <p class="lead"> 
            {{$booking->description}}
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
                        <p>{{$booking->start_date}}</p>
                        <p>{{$booking->end_date}}</p>
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
                        <p>{{$booking->room->name}}</p>
                        <p>{{$booking->room->adress}}</p>
                    </div>
                </td>
            </table>
   
        @if (Auth::check())
            @if (Auth::user()->id === $booking->user->id or Auth::user()->admin === 1)

            {!! Form::open( array('method' => 'delete', 'url' => "/bookings/{{$booking->id}}")) !!}
            {{ Form::hidden('id', null,['value' => $booking->id]) }}
            {{ Form::submit('Delete booking', ['class' => 'btn btn-lg btn-primary pull-right']) }}
        {{ Form::close() }}
            @endif 
        @endif

    </div>
    <div class="col-md-5 order-md-1">     
            <img class="featurette-image img-fluid mx-auto" src="/img/books/{{$booking->image}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image"> 
  </div>
</div>
