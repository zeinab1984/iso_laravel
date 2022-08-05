<div class="container">
    <form action="{{route('replyAdd')}}" method="post" >
        @csrf
        @foreach($comments as $comment)

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4"> نظر : @if($comment->user_id==null) {{$comment->author_name}}@else{{$comment->user->name}} @endif</label>
                    <textarea name="comment_content"  class="form-control" id="inputEmail4" cols="30" rows="2">{{$comment->content}}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="fa-reply" data-comment_id="{{$comment->id}}">پاسخ</button>
                </div>
            </div>


            {{-- Form reply--}}

            <div class="form-group col-md-12 " id="reply-form-{{$comment->id}}" style="display: none">
                <form action="{{route('replyAdd')}}" method="post">
                    @csrf
                    <div class="form-row ml-3">
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
                        <input type="hidden" name="post_id" value="{{$post_id}}">
                        <input type="hidden" name="parent_id" value="{{$comment->id}}">

                    </div>
                    <button type="submit" class="btn btn-success">ارسال</button>
                    <button  class="btn-danger" data-comment_id="{{$comment->id}}">لغو</button>
                </form>
            </div>
            @include('frontpage.replyAdd',['comments'=>$comment->replies,'post_id'=>$post->id ])
        @endforeach
    </form>
</div>


@section('myscript')
    <script>
        $(document).ready(function (){

            $(".fa-reply").click(function (e) {
                e.preventDefault();
                var comment_id = $(this).attr('data-comment_id');
                $("#reply-form-" + comment_id).show("slow");
            });
            $(".btn-danger").click(function (e){
                e.preventDefault();
                var comment_id = $(this).attr('data-comment_id');
                $("#reply-form-" + comment_id).hide("slow");
            })
        });
    </script>
@endsection







