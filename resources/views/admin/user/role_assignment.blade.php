@extends('layouts.dashboard')

@section('title','انتساب نقش')


@section('content')

    <form method="post" action="{{route('users.role.store',['user'=>$user->id])}}">
        @csrf
    <div class="card-body">
        <div class="card-header">
            <h3 class="card-title">انتساب نقش </h3>
        </div>
        <div class="form-group">
           <div class="form-check">
                <input class="form-check-input" name="role[]" type="checkbox" value="1" id="flexCheckDefault" @if(@in_array('admin',$roles))checked @endif>
                <label class="form-check-label" for="flexCheckDefault">مدیر سایت</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="role[]" type="checkbox" value="4" id="flexCheckChecked" @if(@in_array('writer',$roles))checked @endif>
                <label class="form-check-label" for="flexCheckChecked">نویسنده</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="role[]" type="checkbox" value="2" id="flexCheckChecked" @if(@in_array('editor',$roles))checked @endif>
                <label class="form-check-label" for="flexCheckChecked">ویرایش گر</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="role[]" type="checkbox" value="3" id="flexCheckChecked" @if(@in_array('user',$roles))checked @endif>
                <label class="form-check-label" for="flexCheckChecked">کاربر معمولی</label>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">ذخیره</button>
        </div>

    </div>
    </form>
@endsection
