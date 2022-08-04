@extends('layouts.dashboard')

@section('title','پروفایل شخصی')

@section('content')
    <div class="form-group">
        @if($file_path)
        <image src="{{asset($file_path)}}"></image>
        @endif
    </div>
    <form  method="post" action="{{route('profile.update',['user'=>$user->id])}}" enctype="multipart/form-data" >
        @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <div class="card-header">
            <h3 class="card-title">مشخصات فردی</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">نام و نام خانوادگی</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputEmail1" >
            </div>
            <div class="form-group">
                <label> ایمیل:</label>
                <input type="email" name="user_email" value="{{$user->email}}" class="form-control" >
            </div>
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">انتخاب عکس</label>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
            </div>
        </div>
    </form>

@endsection
