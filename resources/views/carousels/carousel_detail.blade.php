<div class="carousel-item">
    <img class="first-slide" src="/carousel/{{$carousel->image}}"
        alt="First slide">
    <div class="container">
        <div class="carousel-caption text-left">
            <h1>{{$carousel->name}}</h1>
            <p>{{$carousel->description}}</p>
            <p>
                <a class="btn btn-lg btn-primary" href="{{$carousel->link}}" role="button">{{$carousel->button}}</a>
            </p>
        </div>
    </div>
</div>
