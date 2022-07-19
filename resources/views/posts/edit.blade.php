@extends('layouts.dashboard');

@section('title','ویرایش پست ها')

@section('content')
    <form  method="post" action="{{route('posts.update',['post'=>$post->id])}}" >
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
            <h3 class="card-title">ویرایش پست </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="" >
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان پست</label>
                    <input type="text" name="title" value="{{$post->title}}" class="form-control" id="exampleInputEmail1" >
                </div>
                <div class="form-group">
                    <label> خلاصه محتوا</label>
                    <textarea name="short_content" class="form-control" rows="1" >{{$post->short_content}}</textarea>
                </div>
                <div class="form-group">
                    <label>محتوا</label>
                    <textarea name="post_content" class="form-control" rows="3" >{{$post->content}}</textarea>
                </div>

                <div class="form-group">
                    <label>نام دسته بندی</label>
                    <select name="category_id" class="form-control">
                        <option>انتخاب کنید:</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->id==$post->category_id)selected @endif>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputError"> وضعیت انتشار</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="پیش نویس" @if($post->status==='پیش نویس')checked @endif>
                        <label class="form-check-label">پیش نویس</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="منتشر شده" @if($post->status==='منتشر شده')checked @endif>
                        <label class="form-check-label">منتشر شده</label>
                    </div>
                </div>
                <div class="form-group">
{{--                    <p>تگ ها:</p>--}}
                    {{--                    @foreach($tags as $tag)--}}
                    {{--                        <div class="form-check">--}}
                    {{--                            <input class="form-check-input" type="checkbox" name="tag[]" value="{{$tag->id}}" >--}}
                    {{--                            <label class="form-check-label">{{$tag->title}}</label>--}}
                    {{--                        </div>--}}
                    {{--                    @endforeach--}}

                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ثبت</button>
            </div>
    </form>
@endsection
