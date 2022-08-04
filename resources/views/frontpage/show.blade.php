@extends('frontpage.index')
@section('title','صفحه اصلی')
@section('content')

<main class="rtl mt-3">
    <div class="d-flex justify-content-center flex-wrap">
        @foreach($posts as $post)
        <div class="card m-2" style="width: 18rem;">
            @foreach($post->files as $file)
            <img src="{{asset($file->file_path)}}" class="card-img-top" alt="store">
            @endforeach
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{route('single.post',['post'=>$post->id])}}" class="nav-link p-0 text-dark">{{$post->title}}</a>
                </h5>
                {{$post->short_content}}
            </div>

            <div class="card-footer">
                <image src="{{$user_pic}}" style="width: 128px;height:auto" ></image>
                <p class="text-success text-center">نویسنده: {{$post->user->name}}</p>
                <a href="{{route('single.post',['post'=>$post->id])}}" class="btn btn-outline-secondary btn-block">ادامه مطلب</a>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
