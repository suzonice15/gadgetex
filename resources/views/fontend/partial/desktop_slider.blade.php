<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    @foreach($sliders as $key=>$slider)
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key}}" class="@if($key==0) active @endif" aria-current="true" aria-label="Slide {{ $key}}"></button>
       @endforeach
    </div>
    <div class="carousel-inner">

    @foreach($sliders as $key=>$slider)
        <div class="carousel-item @if($key==0) active @endif" data-bs-interval="10000">
            <img style="cursor:pointer" onclick="location.href='{{$slider->target_url}}';"   src="{{asset('/uploads/sliders')}}/{{$slider->homeslider_picture}}" class="d-block w-100" alt="...">           
        </div>
        @endforeach

       
       

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>