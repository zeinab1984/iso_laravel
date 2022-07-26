@extends('frontpage.index')

@section('content')
    <main class="rtl mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-5 d-flex d-md-block justify-content-center">
                    <div class="d-flex justify-content-center single-img mb-4">
                        <img src="/../images/p1.jpg" alt="file">
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-7">
                    <h1 class="o-font-md font-weight-bold"></h1>
                    دسته بندی مقاله:<span class="text-muted d-block mb-2">{{$post->title}} </span>
                    <strong>نویسنده: </strong><span class="d-block text-success">{{$post->user->name}}</span>
                </div>
            </div>
            <hr>
            <article class="o-font-sm text-dark text-justify">
                <p>
                    {{$post->content}}
                </p>

                <hr>
                <h5 class="mb-3">فرم ثبت نظر کاربران</h5>
                <form action="" method="post">
                    <div class="form-row">

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
                        <div class="form-group col-md-12">
                            <label for="inputEmail4"> نظر شما:</label>
                            <textarea name="content"  class="form-control" id="inputEmail4" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت نظر</button>
                </form>
            </article>
        </div>
    </main>
@endsection
