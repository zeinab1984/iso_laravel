<form action="{{route('replyAdd')}}" method="post">
    @csrf
    <div class="form-row">
        @if(Auth::check()===false)

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
        @endif
        <div class="form-group col-md-12">
            <label for="inputEmail4"> نظر شما:</label>
            <textarea name="comment_content"  class="form-control" id="inputEmail4" cols="30" rows="2"></textarea>
        </div>
        <input type="hidden" name="post_id" value="{{$post_id}}">
        <input type="hidden" name="parent_id" value="{{$parent_id}}">

    </div>
    <button type="submit" class="btn btn-success">ارسال</button>
    <button  type="cancel" class="btn btn-danger" id="cancel">لغو</button>
</form>
