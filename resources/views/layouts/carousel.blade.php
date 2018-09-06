<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"><img src="" alt=""></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @if (Auth::check())
            @if (Auth::user()->admin === 1)
            <div class="mr-auto">
                <a class="btn btn-lg btn-primary" href="#" role="button">Edit</a>
            </div>
            @endif
        @endif
        <div class="carousel-item active">
            <img class="first-slide" src="https://www.aoh.dk/storyimage/AO/20170701/ARTIKEL/170709919/AR/0/AR-170709919.jpg&MaxH=415&imageVersion=default&Q=95&MT=DT20170703075154"
                alt="First slide">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1>Example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                        at eget
                        metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="https://www.aoh.dk/storyimage/AO/20170701/ARTIKEL/170709919/EP/1/3/EP-170709919.jpg&MaxW=623&Q=95&MT=DT20170703075154"
                alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                        at eget
                        metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slide" src="http://www.kbh.dk/files/styles/article_view_fullwidth_1x/public/media/2018/03/skaermbillede_2018-01-15_kl._11.32.12.jpg?itok=plqteDm4"
                alt="Third slide">
            <div class="container">
                <div class="carousel-caption text-right">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                        at eget
                        metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
