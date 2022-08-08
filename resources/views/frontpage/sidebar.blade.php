
<div class="container">
    <div class="slideshow-container" >
        @foreach($latest_posts as $latest_post)
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            @if($latest_post->files()->first()==null && $latest_post->files()->first()=="")
                <img src="{{asset('/storage/posts/1659783458_photo4.jpg')}}" alt="store">
            @else
                <img src="{{asset('/storage/'.$latest_post->files()->first()->file_path)}}" style="width:100%">
            @endif
            <div class="text">Caption Text</div>
        </div>
        @endforeach

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</div>

