@extends('dashboard');

@section('title','ایجاد دسته بندی جدید')

@section('content')
    <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">ایجاد دسته بندی جدید</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">ایجاد دسته بندی جدید</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

        <!-- /.content-header -->

            <form role="form" action="{{route('categories.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">دسته بندی جدید</label>
                        <input type="text"  name="title"  class="form-control" id="exampleInputEmail1" placeholder="عنوان پست را وارد کنید">
                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">ثبت</button>
                    </div>
                </div>
            </form>
    </div>
@endsection
