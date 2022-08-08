@extends('frontpage.index')
@section('title','جستجو')

@section('content')
    <main class="rtl mt-3">
        <div class="d-flex justify-content-center flex-wrap">
{{--            @dd($result)--}}
            @foreach($result as $post)
                <div class="card m-2" style="width: 18rem;">
                    @if($post->files->first()==null && $post->files->first()=="")
                        <img src="{{asset('storage/posts/1659783458_photo4.jpg')}}" alt="store">
                    @else
                        <img src="{{url('/storage/'.$post->files->first()->file_path)}}" alt="store">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{route('single.post',['post'=>$post->id])}}" class="nav-link p-0 text-dark">{{$post->title}}</a>
                        </h5>
                        {{$post->short_content}}
                    </div>

                    <div class="card-footer">
                        <img src="{{$post->user->files()->first()->file_path}}" style="width: 50px;height:auto" >
                        <p class="text-success text-center">نویسنده: {{$post->user->name}}</p>
                        <a href="{{route('single.post',['post'=>$post->id])}}" class="btn btn-outline-secondary btn-block">ادامه مطلب</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
