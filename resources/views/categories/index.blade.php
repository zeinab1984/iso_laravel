@extends('layouts.dashboard');

@section('title','لیست دسته بندی ها')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 10px">ردیف</th>
            <th>عنوان</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->title}}</td>
                <td>
                    <a href="{{route('categories.edit',['category'=>$category->id])}}" class="btn btn-sm btn-primary">ویرایش</a>
                    <a href="{{route('categories.destroy',['category'=>$category->id])}}" onclick="return confirm('آیا مطمئن هستید؟')" class="btn btn-sm btn-danger">حذف</a>

                </td>
        @endforeach
        </tbody>
    </table>
@endsection
