@extends('layouts.dashboard');

@section('title','ویرایش پست ها')

@section('content')


    <form  method="post" action="{{route('posts.update',['post'=>$post->id])}}" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="form-group">

                    <image src="{{asset('public/'.$post->files()->first()->file_path)}}" style="width:128px"></image>

            </div>
            <h3 class="card-title">ویرایش پست </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
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
                    <p>تگ ها:</p>
                          @foreach($tags as $tag)
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="tag[]" value="{{$tag->id}}"
                                         @if(@in_array($tag->id,$tag_ids))checked @endif >
                                  <label class="form-check-label">{{$tag->title}}</label>
                              </div>
                          @endforeach

                </div>
                <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="chooseFile">
                    <label class="custom-file-label" for="chooseFile">انتخاب عکس</label>
                </div>
        </div>

        </div>
            <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">ثبت</button>
        </div>
    </form>
@endsection
