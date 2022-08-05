@extends('frontpage.index')
@section('title',$post->title)
@section('content')
    <main class="rtl mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-5 d-flex d-md-block justify-content-center">
                    <div class="d-flex justify-content-center single-img mb-4">
                        <img src="{{asset($file_path)}}" alt="file">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-7">
                    <h1 class="o-font-md font-weight-bold">{{$post->title}}</h1>
                    دسته بندی مقاله:<span class="text-muted d-block mb-2">{{$post->category->title}} </span>
                    <strong>نویسنده: </strong><span class="d-block text-success">{{$post->user->name}}</span>
                </div>
            </div>
            <hr>
                <article class="o-font-sm text-dark text-justify">
                    <p>
                        {{$post->content}}
                    </p>
                </article>
            <hr>
{{-- Form comments--}}
            <h5 class="mb-3">فرم ثبت نظر کاربران</h5>
            <div class="form-row">
                <form action="{{route('CommentAdd')}}" method="post">
                    @csrf
                    <div class="form-row">
                        @if(Auth::check()===false)

                        <div class="form-group col-md-6">
                            <label for="inputName4">نام</label>
                            <input type="text" name="first_name"  class="form-control" id="inputName4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputName4">نام خانوادگی</label>
                            <input type="text" name="last_name"  class="form-control" id="inputName4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail44">ایمیل</label>
                            <input type="email" name="email" class="form-control" id="inputEmail44">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPhone4">شماره همراه</label>
                            <input type="text" name="mobile" class="form-control" id="inputPhone4">
                        </div>
                        @endif
                        <div class="form-group col-md-12">
                            <label for="inputEmail4"> نظر شما:</label>
                            <textarea name="comment_content"  class="form-control" id="inputEmail4" cols="30" rows="2"></textarea>
                        </div>
                        <input type="hidden" name="post_id" value="{{$post->id}}">

                    </div>
                    <button type="submit" class="btn btn-success">ارسال</button>
                </form>
            </div>
            <br><br>
            <h5 class="mb-3"> نظر کاربران</h5>
            <hr>
            @include('frontpage.replyAdd',['comments'=>$post->comments,'post_id'=>$post->id ])
{{--show comments--}}
{{--           <div class="container">--}}
{{--               <h5 class="mb-3"> نظر کاربران</h5>--}}

{{--                <form action="{{route('replyAdd')}}" method="post" >--}}
{{--                @csrf--}}
{{--                @foreach($post->comments as $comment)--}}

{{--                    <div class="form-row">--}}
{{--                        <div class="form-group col-md-12">--}}
{{--                                <label for="inputEmail4"> نظر : @if($comment->user->name==Null) {{$comment->author_name}}@else{{$comment->user->name}} @endif</label>--}}
{{--                            <textarea name="comment_content"  class="form-control" id="inputEmail4" cols="30" rows="2">{{$comment->content}}</textarea>--}}
{{--                        </div>--}}
{{--                        <div class="form-group col-md-12">--}}
{{--                            <button type="submit" class="fa-reply" data-comment_id="{{$comment->id}}">پاسخ</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{-- --}}{{-- Form reply--}}
{{--                <div class="form-group col-md-12" id="reply-form-{{$comment->id}}" style="display: none">--}}
{{--                     @include('frontpage.replyAdd',['post_id'=>$post->id , 'parent_id'=>$comment->id])--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--               </form>--}}
{{--           </div>--}}

        </div>
    </main>
@endsection

