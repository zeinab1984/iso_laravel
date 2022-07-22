@extends('layouts.dashboard')

@section('title','مدیر سایت')


@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 10px">ردیف</th>
            <th>نام و نام خانوادگی</th>
            <th>ایمیل</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
{{--                <td>--}}
{{--                @foreach($user->roles as $role)--}}
{{--                     <ul>--}}
{{--                         <li>{{$role->pivot->role_id}}</li>--}}
{{--                     </ul>--}}
{{--                @endforeach--}}
{{--                </td>--}}
                <td>
                    <a href="{{route('users.assignment',['user'=>$user->id])}}" class="btn btn-sm btn-primary">انتساب نقش</a>
                    <a href="" onclick="return confirm('آیا مطمئن هستید؟')" class="btn btn-sm btn-danger">حذف</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


