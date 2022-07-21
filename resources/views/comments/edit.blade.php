@extends('layouts.dashboard')

@section('title','نظرات')

@section('content')

    <form  method="post" action="{{route('comments.update',['comment'=>$comment->id])}}" >
        @csrf
        {{--        @if ($errors->any())--}}
        {{--            <div class="alert alert-danger">--}}
        {{--                <ul>--}}
        {{--                    @foreach ($errors->all() as $error)--}}
        {{--                        <li>{{ $error }}</li>--}}
        {{--                    @endforeach--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--        @endif--}}
        <div class="card-header">
            <h3 class="card-title">جزییات نظر</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->


            <div class="card-body">
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">عنوان پست</label>--}}
{{--                    <input type="text" name="title" value="" class="form-control" id="exampleInputEmail1" >--}}
{{--                </div>--}}
                <div class="form-group">
                    <label> متن نظر:</label>
                    <textarea name="comment_content" class="form-control" rows="1" readonly>{{$comment->content}}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="inputError"> وضعیت انتشار</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_confirm" value="0" @if($comment->is_confirm===0)checked @endif>
                        <label class="form-check-label">تایید نشده</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_confirm" value="1" @if($comment->is_confirm===1)checked @endif>
                        <label class="form-check-label">تایید شده</label>
                    </div>
                </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">ثبت</button>
                    </div>
            </div>
        </form>

@endsection
