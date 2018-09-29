
<div class="card col-md-3" style="max-width: 20%;">
    <img class="card-img-top img-thumbnail" src="img/partners/{{$partner->image}}" alt="Card image cap" style="height:180px; width:180px; object-fit: cover">
    <div class="card-body">
        <h5 class="card-title">{{$partner->name}}</h5>
        <p class="card-text">{{$partner->description}}</p>
    </div>
    <div class="card-footer bg-transparent border-success">
        <small class="text-muted"><a href="{{$partner->link}}">Link</a></small>            
    </div>    
</div>

