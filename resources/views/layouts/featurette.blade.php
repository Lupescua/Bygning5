<div class="container">
    @if (count($events)>0)
        @foreach ($events as $event)
            @include ('events.event_detail')
        @endforeach
    @endif
</div>
