@extends('layouts.dashboard')

@section('title','نظرات')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 10px">ردیف</th>
            <th>نظرات</th>
            <th>عملیات</th>
            <th>وضعیت انتشار</th>

        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{substr($comment->content,0,20).'...'}}</td>
                <td>
                    <a href="{{route('comments.edit',['comment'=>$comment->id])}}"  class="btn btn-sm btn-primary">جزئیات</a>
                     <a href="{{route('comments.destroy',['comment'=>$comment->id])}}" onclick="return confirm('آیا مطمئن هستید؟')" class="btn btn-sm btn-danger">حذف</a>

                </td>
                <td style="padding-left: 50px">
                    @if($comment->is_confirm===1)
                        <input class="form-check-input" type="checkbox" checked>
                    @else
                        <input class="form-check-input" type="checkbox">
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
